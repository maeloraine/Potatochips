<?php

// app/Http/Controllers/PaymentController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\Room;


class PaymentController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        // Retrieve temporary booking data
        $tempBooking = Session::get('temp_booking');

        if (!$tempBooking) {
            return response()->json(['error' => 'No temporary booking found'], 404);
        }

        // Calculate total amount (example: room rate * number of nights)
        $room = Room::find($tempBooking['room_id']);
        $checkIn = new \DateTime($tempBooking['check_in_date']);
        $checkOut = new \DateTime($tempBooking['check_out_date']);
        $nights = $checkOut->diff($checkIn)->days;
        $totalAmount = $room->Room_Rate * $nights * 100; // Convert to cents

        // Create PayMongo payment intent
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(config('services.paymongo.secret_key')),
            'Content-Type' => 'application/json',
        ])->post('https://api.paymongo.com/v1/payment_intents', [
            'data' => [
                'attributes' => [
                    'amount' => $totalAmount,
                    'payment_method_allowed' => ['card'],
                    'currency' => 'PHP',
                    'description' => 'Booking for ' . $tempBooking['Guest_FName'] . ' ' . $tempBooking['Guest_LName'],
                ],
            ],
        ]);

        if ($response->successful()) {
            $paymentIntent = $response->json()['data'];
            return response()->json(['checkout_url' => $paymentIntent['attributes']['checkout_url']], 200);
        } else {
            return response()->json(['error' => 'Failed to create payment intent'], 500);
        }
    }
}