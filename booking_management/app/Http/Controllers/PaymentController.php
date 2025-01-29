<?php

namespace App\Http\Controllers;

use App\Services\PayMongoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Curl;
use Exception;
use App\Models\Customer;
use App\Models\Guest;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Room;

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
    
        Log::info('Validated Data:', $validatedData);
        // Store the validated data in the session
    
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
                    'success_url' => route('customer-reservations'),//'http://localhost:8000/success',
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

            // Save booking details to the database (optional)
            // $this->saveBookingDetails($responseData);

  

            return response()->json($responseData);
        } catch (Exception $e) {
            Log::error('PayMongo Success Error:', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}