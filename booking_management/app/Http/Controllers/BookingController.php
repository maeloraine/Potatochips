<?php

namespace App\Http\Controllers;

use App\Services\BookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // Add the Log facade

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    /**
     * Show the form for creating a new booking.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        try {
            Log::info('Create booking form accessed.', [
                'query_parameters' => $request->query()
            ]);

            // Retrieve guest data from query parameters
            $firstName = $request->query('firstName');
            $lastName = $request->query('lastName');
            $gender = $request->query('gender');
            $birthdate = $request->query('birthdate');
            $email = $request->query('email');
            $phone = $request->query('phone');
            $address = $request->query('address');
            $specialRequests = $request->query('specialRequests');

            // Fetch rooms from the database
            $rooms = DB::table('rooms')->get();

            Log::info('Rooms fetched successfully.', ['rooms_count' => $rooms->count()]);

            // Pass guest and room data to the view
            return view('Pokemon.Employee.Home.admin-add-booking', [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'gender' => $gender,
                'birthdate' => $birthdate,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'specialRequests' => $specialRequests,
                'rooms' => $rooms,
            ]);
        } catch (\Exception $e) {
            Log::error('Error in create booking form.', ['error' => $e->getMessage()]);
            abort(500, 'An error occurred while accessing the booking form.');
        }
    }

    /**
     * Create a new booking.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            Log::info('Store booking request received.', [
                'request_data' => $request->all()
            ]);

            $validated = $request->validate([
                'check_in_date' => 'required|date',
                'check_out_date' => 'required|date|after:check_in_date',
                'check_in_time' => 'required|date_format:H:i',
                'check_out_time' => 'required|date_format:H:i',
                'guest_id' => 'required|integer|exists:guests,guest_id',
                'room_id' => 'required|integer|exists:rooms,room_id',
            ]);

            Log::info('Booking request validated successfully.', ['validated_data' => $validated]);

            // Delegate to BookingService
            $bookingReference = $this->bookingService->createBooking($validated);

            Log::info('Booking created successfully.', ['reference' => $bookingReference]);

            return response()->json([
                'message' => 'Booking created!',
                'reference' => $bookingReference
            ], 201);

        } catch (\Exception $e) {
            Log::error('Error creating booking.', ['error' => $e->getMessage()]);
            return response()->json([
                'error' => 'Booking failed: ' . $e->getMessage()
            ], 400);
        }
    }
}
