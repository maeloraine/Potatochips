<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{

    public function customerReservations()
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('customer.login')->with('error', 'Please log in to view your bookings.');
        }

        $customer = Auth::guard('customer')->user();
        
        // Fetch bookings along with their associated rooms
        $bookings = Booking::where('customer_id', $customer->customer_id)
                    ->with('room') // Make sure to define this relation in your Booking model
                    ->get();

        return view('Pokemon.Customer.Home.customer-reservations', compact('bookings'));
    }

    public function store(Request $request)
    {
        dd($request->all());
       // Ensure the customer is authenticated
        if (!Auth::guard('customer')->check()) {
            return response()->json([
                'message' => 'Unauthorized. Please log in to proceed.',
            ], 401);
        }
        
        // Validate the request
        $validatedData = $request->validate([
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'room_id' => 'required|exists:rooms,room_id',
            'guestInfo.Guest_FName' => 'required|string|max:50',
            'guestInfo.Guest_LName' => 'required|string|max:25',
            'guestInfo.Guest_Birthdate' => 'required|date',
            'guestInfo.Guest_Gender' => 'required|in:Male,Female,Rather Not Say',
            'guestInfo.Guest_Email' => 'required|email',
            'guestInfo.Guest_ContactNumber' => 'required|string|max:20',
            'guestInfo.Guest_Address' => 'required|string|max:255',
            'guestInfo.Special_Request' => 'nullable|string',

        ]);

        // Get the logged-in customer
        $customer = Auth::guard('customer')->user();

        // Create the guest
        $guest = Guest::create([
            'Guest_FName' => $validatedData['guestInfo']['Guest_FName'],
            'Guest_LName' => $validatedData['guestInfo']['Guest_LName'],
            'Guest_Birthdate' => $validatedData['guestInfo']['Guest_Birthdate'],
            'Guest_Gender' => $validatedData['guestInfo']['Guest_Gender'],
            'Guest_Email' => $validatedData['guestInfo']['Guest_Email'],
            'Guest_ContactNumber' => $validatedData['guestInfo']['Guest_ContactNumber'],
            'Guest_Addres' => $validatedData['guestInfo']['Guest_Address'],
            'Special_Request' => $validatedData['guestInfo']['Special_Request'],
        ]);

        // Generate a unique booking reference
        $bookingReference = 'BOOK-' . strtoupper(Str::random(6)); // Example: BOOK-ABC123

        // Create the booking
        $booking = Booking::create([
            'booking_reference' => $bookingReference,
            'check_in_date' => $validatedData['check_in_date'],
            'check_out_date' => $validatedData['check_out_date'],
            'check_in_time' => '14:00:00', // Default check-in time (2:00 PM)
            'check_out_time' => '12:00:00', // Default check-out time (12:00 PM)
            'booking_status' => 'pending',
            'guest_id' => $guest->guest_id,         // Associate with the created guest
            'room_id' => $validatedData['room_id'], // Associate with the selected room
            'customer_id' => $customer->customer_id, // Associate with the logged-in customer
        ]);

        // Associate rooms with the booking
        foreach ($validatedData['bookings'] as $room) {
            $booking->rooms()->attach($room['id'], [
                'price' => $room['price'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Redirect to payment page or return a response
        return response()->json([
            'message' => 'Booking created successfully',
            'booking' => $booking,
            'guest' => $guest,
            'customer' => $customer,
        ], 201);
        }
}
