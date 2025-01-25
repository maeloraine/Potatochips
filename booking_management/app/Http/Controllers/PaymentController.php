<?php

namespace App\Http\Controllers;

use App\Services\PayMongoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Curl;
use Exception;

class PaymentController extends Controller
{
    /**
     * Handles the creation of a PayMongo checkout session and redirects to the checkout URL.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function pay(PayMongoService $payMongoService)
    {
        $data = [
            'data' => [
                'attributes' => [
                    'line_items' => [
                        [
                            'currency' => 'PHP',
                            'amount' => 10000,
                            'description' => 'text',
                            'name' => 'Test Product',
                            'quantity' => 1,
                        ]
                    ],
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
                    'cancel_url' => 'http://localhost:8000/success',
                    'description' => 'text',
                ],
            ]
        ];
    
        try {
            $responseData = $payMongoService->createCheckoutSession($data);
            Session::put('session_id', $responseData['data']['id']);
            return redirect()->to($responseData['data']['attributes']['checkout_url']);
        } catch (Exception $e) {
            Log::error('PayMongo API Error:', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function success(PayMongoService $payMongoService)
    {
        try {
            $sessionId = Session::get('session_id');
            if (!$sessionId) {
                throw new Exception('Session ID is missing.');
            }
    
            $responseData = $payMongoService->getCheckoutSession($sessionId);
            Log::info('PayMongo Success Response:', $responseData);
            return response()->json($responseData);
        } catch (Exception $e) {
            Log::error('PayMongo Success Error:', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    
}