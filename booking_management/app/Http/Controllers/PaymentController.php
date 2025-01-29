<?php

namespace App\Http\Controllers;

use App\Services\PayMongoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Exception;

class PaymentController extends Controller
{
    public function pay(Request $request, PayMongoService $payMongoService)
    {
        Log::info('Incoming Booking Data:', $request->all());
    
        $validatedData = $request->validate([
            'bookings' => 'required|array',
            'bookings.*.id' => 'required|numeric',
            'bookings.*.id' => 'required|exists:rooms,room_id', // Validate room_id
            'bookings.*.name' => 'required|string',
            'bookings.*.price' => 'required|numeric',
            'bookings.*.details' => 'nullable|string',
            'totalPrice' => 'required|numeric',
            'checkInDate' => 'required|date',
            'checkOutDate' => 'required|date',
            'adults' => 'required|numeric',
            'children' => 'required|numeric',
            'guestInfo' => 'required|array',
            'guestInfo.firstName' => 'required|string',
            'guestInfo.lastName' => 'required|string',
            'guestInfo.gender' => 'required|string',
            'guestInfo.birthdate' => 'required|date',
            'guestInfo.email' => 'required|email',
            'guestInfo.phone' => 'required|string',
            'guestInfo.address' => 'required|string',
            'guestInfo.specialRequests' => 'nullable|string',
        ]);

        // Store the validated data in the session before creating PayMongo checkout
        Session::put('booking_data', $validatedData);
    
        $lineItems = [];
        foreach ($validatedData['bookings'] as $booking) {
            $lineItems[] = [
                'currency' => 'PHP',
                'amount' => (int) ($booking['price'] * 100),
                'description' => substr($booking['details'] ?? '', 0, 255),
                'name' => $booking['name'],
                'quantity' => 1,
            ];
        }
    
        $data = [
            'data' => [
                'attributes' => [
                    'line_items' => $lineItems,
                    'payment_method_types' => [
                        'card',
                        'gcash',
                        'paymaya',
                        'grab_pay',
                        'dob',
                        'dob_ubp',
                        'brankas_bdo',
                        'brankas_landbank',
                        'brankas_metrobank',
                    ],
                    'success_url' => 'http://localhost:8000/success',
                    'cancel_url' => 'http://localhost:8000/cancel',
                    'description' => 'Online Booking',
                ],
            ]
        ];
    
        try {
            $responseData = $payMongoService->createCheckoutSession($data);
            Session::put('session_id', $responseData['data']['id']);
            
            return response()->json(['checkout_url' => $responseData['data']['attributes']['checkout_url']]);
        } catch (Exception $e) {
            Log::error('PayMongo API Error:', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function success(PayMongoService $payMongoService)
    {
        try {
            // Retrieve the session data first
            $sessionId = Session::get('session_id');
            $validatedData = Session::get('booking_data');

            if (!$sessionId) {
                throw new Exception('Session ID is missing.');
            }

            if (!$validatedData) {
                throw new Exception('Booking data not found in session.');
            }

            $responseData = $payMongoService->getCheckoutSession($sessionId);
            $attributes = $responseData['data']['attributes'];

            if (empty($attributes['payments'])) {
                throw new Exception('No payments found in the response.');
            }

            $payment = $attributes['payments'][0]['attributes'];
            $paymentStatus = $payment['status'] ?? 'unknown';

            if ($paymentStatus === 'paid') {
                // Get the authenticated user as the customer
                $customer = Auth::user();
                if (!$customer) {
                    throw new Exception('No authenticated customer found.');
                }
                $guest = \App\Models\Guest::firstOrCreate(
                    ['email' => $validatedData['guestInfo']['email']],
                    [
                        'first_name' => $validatedData['guestInfo']['firstName'],
                        'last_name' => $validatedData['guestInfo']['lastName'],
                        'gender' => $validatedData['guestInfo']['gender'],
                        'birthdate' => $validatedData['guestInfo']['birthdate'],
                        'phone' => $validatedData['guestInfo']['phone'],
                        'address' => $validatedData['guestInfo']['address'],
                        'special_requests' => $validatedData['guestInfo']['specialRequests'] ?? null,
                    ]
                );
                
                if (!$guest->exists) {
                    throw new Exception('Failed to create or find guest');
                }
                
                Log::info('Guest Created/Found:', $guest->toArray());

                $guest = \App\Models\Guest::where('email', $validatedData['guestInfo']['email'])->first();
                if (!$guest || !$guest->guest_id) {
                    throw new Exception('Guest ID is missing.');
                }

                // Save bookings
                foreach ($validatedData['bookings'] as $booking) {
                    \App\Models\Booking::create([
                        'customer_id' => $customer->customer_id, // Assigning logged-in user as customer
                        'room_id' => $booking['id'],
                        'guest_id' => $guest->guest_id,
                        'name' => $booking['name'],
                        'price' => $booking['price'],
                        'details' => $booking['details'] ?? null,
                        'check_in_date' => $validatedData['checkInDate'],
                        'check_out_date' => $validatedData['checkOutDate'],
                        'adults' => $validatedData['adults'],
                        'children' => $validatedData['children'],
                    ]);
                }

                // Save payment
                \App\Models\Payment::create([
                    'guest_id' => $guest->guest_id,
                    'session_id' => $sessionId,
                    'payment_id' => $payment['payment_intent_id'] ?? $responseData['data']['id'],
                    'amount' => $payment['amount'] / 100,
                    'currency' => $payment['currency'],
                    'status' => $paymentStatus,
                    'payment_method' => $payment['source']['type'] ?? 'unknown',
                    'description' => $payment['description'] ?? 'Online Booking',
                ]);

                // Clear the session data after successful processing
                Session::forget(['session_id', 'booking_data']);

                return response()->json(['message' => 'Booking and payment details saved successfully.']);
            } else {
                throw new Exception('Payment status is not successful. Status: ' . $paymentStatus);
            }
        } catch (Exception $e) {
            Log::error('PayMongo Success Error:', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}