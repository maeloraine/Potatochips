<?php

namespace App\Http\Controllers;

use App\Services\BookingService;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // Add the Log facade

class BookingController extends Controller
{
    protected $bookingService;

    public function index() {
        $rooms = Room::all(); //To fetch the available rooms for booking
        return view('Pokemon.Employee.Home.admin-add-booking', ['rooms' => $rooms]);
    }

        public function showBooking()
    {
        // Fetch available rooms
        // Fetch only rooms that are available
        $availableRooms = Room::where('Room_Status', 'available')->get();

        // Fetch bookings using stored procedure
        $bookings = DB::select('EXEC SP_GetBookings');

        return view('Pokemon.Employee.Home.admin-booking', compact('availableRooms', 'bookings'));
    }

    public function availRooms()
    {
        $availableRooms = Room::where('Room_Status', 'Available')->get();
        
        return view('Pokemon.Employee.Home.admin-booking', compact('availableRooms'));
    }

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:50',
            'lastName' => 'required|string|max:25',
            'birthdate' => 'required|date',
            'gender' => 'required|string',
            'email' => 'required|email|unique:guests,email',
            'phone' => 'required|string|size:11',
            'address' => 'required|string|max:255',
            'specialRequests' => 'nullable|string|max:255',
            'room_id' => 'required|integer|exists:rooms,room_id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'check_in_time' => 'required',
            'check_out_time' => 'required',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
            'booking_status' => 'required|string|in:reserved,checked_in,checked_out'
        ]);
        $specialRequests = $request->input('specialRequests', 'None'); // Default to "None" if empty

        DB::beginTransaction(); // Start Transaction

        try {
            // Execute the stored procedure for booking
            DB::statement('EXEC SP_CreateGuestBooking ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?', [
                $validatedData['firstName'],
                $validatedData['lastName'],
                $validatedData['birthdate'],
                $validatedData['gender'],
                $validatedData['email'],
                $validatedData['phone'],
                $validatedData['address'],
                $specialRequests,
                $validatedData['room_id'],
                $validatedData['check_in_date'],
                $validatedData['check_out_date'],
                $validatedData['check_in_time'],
                $validatedData['check_out_time'],
                $validatedData['adults'],
                $validatedData['children'],
                1000, // Example price, should be dynamically calculated
                $validatedData['booking_status']
            ]);
    
            // Update the room status if the booking is "checked_in"
            if ($validatedData['booking_status'] == 'checked_in') {
                Room::where('room_id', $validatedData['room_id'])
                    ->update(['Room_Status' => 'occupied']);
            }
    
            DB::commit(); // Commit transaction
    
            return redirect()->route('admin.bookings')->with('success', 'Your booking was successfully created!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction if any error occurs
            return redirect()->route('admin.bookings')->with('error', 'An error occurred while processing your booking.');
        }
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'booking_status' => 'required|string|in:reserved,checked_in,checked_out'
        ]);

        DB::beginTransaction();

        try {
            // Execute the stored procedure
            DB::statement('EXEC SP_UpdateBookingStatus ?, ?', [
                $id,
                $validatedData['booking_status']
            ]);

            DB::commit();

            return redirect()->route('admin.bookings')->with('success', 'Booking updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.bookings')->with('error', 'An error occurred while updating the booking.');
        }
    }



    /**
     * Show the form for creating a new booking.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    // public function create(Request $request)
    // {
    //     try {
    //         Log::info('Create booking form accessed.', [
    //             'query_parameters' => $request->query()
    //         ]);

    //         // Retrieve guest data from query parameters
    //         $firstName = $request->query('firstName');
    //         $lastName = $request->query('lastName');
    //         $gender = $request->query('gender');
    //         $birthdate = $request->query('birthdate');
    //         $email = $request->query('email');
    //         $phone = $request->query('phone');
    //         $address = $request->query('address');
    //         $specialRequests = $request->query('specialRequests');

    //         // Fetch rooms from the database
    //         $rooms = DB::table('rooms')->get();

    //         Log::info('Rooms fetched successfully.', ['rooms_count' => $rooms->count()]);

    //         // Pass guest and room data to the view
    //         return view('Pokemon.Employee.Home.admin-add-booking', [
    //             'firstName' => $firstName,
    //             'lastName' => $lastName,
    //             'gender' => $gender,
    //             'birthdate' => $birthdate,
    //             'email' => $email,
    //             'phone' => $phone,
    //             'address' => $address,
    //             'specialRequests' => $specialRequests,
    //             'rooms' => $rooms,
    //         ]);
    //     } catch (\Exception $e) {
    //         Log::error('Error in create booking form.', ['error' => $e->getMessage()]);
    //         abort(500, 'An error occurred while accessing the booking form.');
    //     }
    // }

    // /**
    //  * Create a new booking.
    //  *
    //  * @param Request $request
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function store(Request $request)
    // {
    //     try {
    //         Log::info('Store booking request received.', [
    //             'request_data' => $request->all()
    //         ]);

    //         $validated = $request->validate([
    //             'check_in_date' => 'required|date',
    //             'check_out_date' => 'required|date|after:check_in_date',
    //             'check_in_time' => 'required|date_format:H:i',
    //             'check_out_time' => 'required|date_format:H:i',
    //             'guest_id' => 'required|integer|exists:guests,guest_id',
    //             'room_id' => 'required|integer|exists:rooms,room_id',
    //         ]);

    //         Log::info('Booking request validated successfully.', ['validated_data' => $validated]);

    //         // Delegate to BookingService
    //         $bookingReference = $this->bookingService->createBooking($validated);

    //         Log::info('Booking created successfully.', ['reference' => $bookingReference]);

    //         return response()->json([
    //             'message' => 'Booking created!',
    //             'reference' => $bookingReference
    //         ], 201);

    //     } catch (\Exception $e) {
    //         Log::error('Error creating booking.', ['error' => $e->getMessage()]);
    //         return response()->json([
    //             'error' => 'Booking failed: ' . $e->getMessage()
    //         ], 400);
    //     }
    // }

    // public function store(Request $request)
    // {
    //     try {
    //         Log::info('Store booking request received.', [
    //             'request_data' => $request->all()
    //         ]);
    
    //         // Validate the request payload
    //         $validated = $request->validate([
    //             'checkInDate' => 'required|date',
    //             'checkOutDate' => 'required|date|after:checkInDate',
    //             'checkInTime' => 'required',
    //             'checkOutTime' => 'required',
    //             'adults' => 'required|integer|min:1',
    //             'children' => 'required|integer|min:0',
    //             'bookings' => 'required|array|min:1',
    //             'bookings.*.id' => 'required|exists:rooms,room_id',
    //             'bookings.*.price' => 'required|numeric|min:0',
    //             'totalPrice' => 'required|numeric|min:0',
    //             'guestInfo' => 'required|array',
    //             'guestInfo.firstName' => 'required|string|max:255',
    //             'guestInfo.lastName' => 'required|string|max:255',
    //             'guestInfo.gender' => 'required|in:male,female',
    //             'guestInfo.birthdate' => 'required|date|before:today',
    //             'guestInfo.email' => 'required|email',
    //             'guestInfo.phone' => 'required|string',
    //             'guestInfo.address' => 'required|string',
    //             'guestInfo.specialRequests' => 'nullable|string',
    //         ]);
    
    //         // Start database transaction
    //         DB::beginTransaction();
    
    //         // Create guest record
    //         $guestId = DB::table('guests')->insertGetId([
    //             'firstName' => $validated['guestInfo']['firstName'],
    //             'lastName' => $validated['guestInfo']['lastName'],
    //             'birthdate' => $validated['guestInfo']['birthdate'],
    //             'gender' => $validated['guestInfo']['gender'],
    //             'email' => $validated['guestInfo']['email'],
    //             'phone' => $validated['guestInfo']['phone'],
    //             'address' => $validated['guestInfo']['address'],
    //             'specialRequests' => $validated['guestInfo']['specialRequests'] ?? 'None',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    
    //         // Generate a unique booking reference
    //         $bookingReference = 'BOOK-' . strtoupper(uniqid());
    
    //         // Create booking record
    //         $bookingId = DB::table('bookings')->insertGetId([
    //             'booking_reference' => $bookingReference,
    //             'check_in_date' => $validated['checkInDate'],
    //             'check_out_date' => $validated['checkOutDate'],
    //             'check_in_time' => $validated['checkInTime'],
    //             'check_out_time' => $validated['checkOutTime'],
    //             'adults' => $validated['adults'],
    //             'children' => $validated['children'],
    //             'total_price' => $validated['totalPrice'],
    //             'guest_id' => $guestId,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    
    //         // Create booking items (rooms)
    //         foreach ($validated['bookings'] as $bookingItem) {
    //             DB::table('booking_items')->insert([
    //                 'booking_id' => $bookingId,
    //                 'room_id' => $bookingItem['id'],
    //                 'price' => $bookingItem['price'],
    //                 'created_at' => now(),
    //                 'updated_at' => now(),
    //             ]);
    //         }
    
    //         // Commit the transaction
    //         DB::commit();
    
    //         return response()->json([
    //             'message' => 'Booking created successfully!',
    //             'booking_reference' => $bookingReference,
    //         ], 201);
    
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         Log::error('Error creating booking.', [
    //             'error' => $e->getMessage(),
    //             'trace' => $e->getTraceAsString()
    //         ]);
    
    //         return response()->json([
    //             'error' => 'Booking failed: ' . $e->getMessage()
    //         ], 400);
    //     }
    // }

    // private function checkRoomAvailability($roomId, $checkIn, $checkOut)
    // {
    //     // Convert dates to Carbon instances for comparison
    //     $checkIn = Carbon::parse($checkIn);
    //     $checkOut = Carbon::parse($checkOut);

    //     // Check if room is already booked for the given dates
    //     $conflictingBookings = DB::table('booking_items')
    //         ->join('bookings', 'booking_items.booking_id', '=', 'bookings.booking_id')
    //         ->where('booking_items.room_id', $roomId)
    //         ->where(function ($query) use ($checkIn, $checkOut) {
    //             $query->whereBetween('check_in_date', [$checkIn, $checkOut])
    //                 ->orWhereBetween('check_out_date', [$checkIn, $checkOut])
    //                 ->orWhere(function ($q) use ($checkIn, $checkOut) {
    //                     $q->where('check_in_date', '<=', $checkIn)
    //                         ->where('check_out_date', '>=', $checkOut);
    //                 });
    //         })
    //         ->where('bookings.status', '!=', 'cancelled')
    //         ->count();

    //     return $conflictingBookings === 0;
    // }
}
