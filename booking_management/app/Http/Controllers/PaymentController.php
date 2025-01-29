<?php

namespace App\Http\Controllers;

use App\Services\PayMongoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Curl;
use Exception;

class PaymentController extends Controller
{
    /**
     * Handles the creation of a PayMongo checkout session and redirects to the checkout URL.
     *
     * @param Request $request
     * @param PayMongoService $payMongoService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function pay(Request $request, PayMongoService $payMongoService)
    {
        // Log the incoming request payload
        Log::info('Incoming Booking Data:', $request->all());
    
        // Validate the request payload
        $validatedData = $request->validate([
            'bookings' => 'required|array',
            'bookings.*.id' => 'required|numeric',
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
        
        Session::put('validated_booking_data', $validatedData);

        Log::info('Validated Data:', $validatedData);
    
        // Prepare line items for PayMongo
        $lineItems = [];
        foreach ($validatedData['bookings'] as $booking) {
            $lineItems[] = [
                'currency' => 'PHP',
                'amount' => (int) ($booking['price'] * 100), // Convert to cents
                'description' => substr($booking['details'] ?? '', 0, 255), // Truncate to 255 characters
                'name' => $booking['name'],
                'quantity' => 1,
            ];
        }
    
        // Prepare PayMongo checkout session data
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
                    'success_url' => 'http://localhost:8000/success',//route('customer-reservations'),
                    'cancel_url' => 'http://localhost:8000/cancel',
                    'description' => 'Online Booking',
                ],
            ]
        ];
    
        Log::info('PayMongo Request Data:', $data);
    
        try {
            // Create PayMongo checkout session
            $responseData = $payMongoService->createCheckoutSession($data);
            Log::info('PayMongo API Response:', $responseData); // Log the PayMongo API response
    
            Session::put('session_id', $responseData['data']['id']);
    
            // Redirect to PayMongo checkout URL
            return response()->json(['checkout_url' => $responseData['data']['attributes']['checkout_url']]);
        } catch (Exception $e) {
            Log::error('PayMongo API Error:', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Handles the success callback from PayMongo.
     *
     * @param PayMongoService $payMongoService
     * @return \Illuminate\Http\JsonResponse
     */

    public function success(PayMongoService $payMongoService)
    {
        try {
            $sessionId = Session::get('session_id');
            if (!$sessionId) {
                throw new Exception('Session ID is missing.');
            }

            // Retrieve checkout session details from PayMongo
            $responseData = $payMongoService->getCheckoutSession($sessionId);
            Log::info('PayMongo Success Response:', $responseData);

            $attributes = $responseData['data']['attributes'];

            // Ensure payments exist and retrieve the first payment's status
            if (empty($attributes['payments'])) {
                throw new Exception('No payments found in the response.');
            }

            $payment = $attributes['payments'][0]['attributes'];
            $paymentStatus = $payment['status'] ?? 'unknown';

            Log::info('Payment Status:', ['status' => $paymentStatus]);

            // Check if payment was successful
            if ($paymentStatus === 'paid') {
                $validatedData = Session::get('validated_booking_data'); // Retrieve stored validated booking data

                if (!$validatedData) {
                    throw new Exception('No booking data found in session.');
                }

                Log::info('Guest Info:', $validatedData['guestInfo']);

                // Ensure guest exists in the database
                $guest = \App\Models\Guest::firstOrCreate(
                    ['email' => $validatedData['guestInfo']['email']], // Match by email
                    [
                        'first_name' => $validatedData['guestInfo']['firstName'],
                        'last_name' => $validatedData['guestInfo']['lastName'],
                        'gender' => $validatedData['guestInfo']['gender'],
                        'birthdate' => $validatedData['guestInfo']['birthdate'],
                        'phone' => $validatedData['guestInfo']['phone'],
                        'address' => $validatedData['guestInfo']['address'],
                        'specialRequests' => $validatedData['guestInfo']['specialRequests'] ?? null,
                    ]
                );

                // Debugging: Log the guest object
                Log::info('Guest created:', ['guest' => $guest]);

                // Manually retrieve the guest again from the database
                $guest = \App\Models\Guest::where('email', $validatedData['guestInfo']['email'])->first();

                if (!$guest || !$guest->id) {
                    Log::error('Guest creation failed. Guest ID is NULL.', ['guest' => $guest]);
                    throw new Exception('Guest creation failed. Guest ID is NULL.');
                }

                Log::info('Guest ID Retrieved:', ['guest_id' => $guest->id]);

                // Save bookings to the database
                foreach ($validatedData['bookings'] as $booking) {
                    Log::info('Creating Booking for Guest ID:', ['guest_id' => $guest->id]);

                    \App\Models\Booking::create([
                        'guest_id' => $guest->id, // Ensure this is not NULL
                        'name' => $booking['name'] ?? 'Default Name', // Ensure name is set
                        'price' => $booking['price'] ?? 0, // Ensure price is set
                        'details' => $booking['details'] ?? null,
                        'check_in_date' => $validatedData['checkInDate'],
                        'check_out_date' => $validatedData['checkOutDate'],
                        'adults' => $validatedData['adults'],
                        'children' => $validatedData['children'],
                    ]);
                }
                
                // Save payment details to the database
                \App\Models\Payment::create([
                    'guest_id' => $guest->id,
                    'session_id' => $sessionId,
                    'payment_id' => $payment['payment_intent_id'] ?? $responseData['data']['id'],
                    'amount' => $payment['amount'] / 100, // Convert cents to currency
                    'currency' => $payment['currency'],
                    'status' => $paymentStatus,
                    'payment_method' => $payment['source']['type'] ?? 'unknown',
                    'description' => $payment['description'] ?? 'Online Booking',
                ]);

                Log::info('Booking and payment details successfully saved.');
                return response()->json(['message' => 'Booking and payment details saved successfully.']);
            } else {
                throw new Exception('Payment status is not successful. Status: ' . $paymentStatus);
            }
        } catch (Exception $e) {
            Log::error('PayMongo Success Error:', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    // public function success(PayMongoService $payMongoService)
    // {
    //     try {
    //         $sessionId = Session::get('session_id');
    //         if (!$sessionId) {
    //             throw new Exception('Session ID is missing.');
    //         }

    //         // Retrieve checkout session details from PayMongo
    //         $responseData = $payMongoService->getCheckoutSession($sessionId);
    //         Log::info('PayMongo Success Response:', $responseData);

    //         // Save booking details to the database (optional)
    //         // $this->saveBookingDetails($responseData);

    //         return response()->json($responseData);
    //     } catch (Exception $e) {
    //         Log::error('PayMongo Success Error:', ['error' => $e->getMessage()]);
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }
}