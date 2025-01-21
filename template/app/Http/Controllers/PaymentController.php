<?php

namespace App\Http\Controllers;

use App\Services\PayMongoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Curl;

class PaymentController extends Controller
{
    /**
     * Handles the creation of a PayMongo checkout session and redirects to the checkout URL.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function pay()
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
            $apiKey = env('PAYMONGO_SECRET_KEY');

            if (!$apiKey) {
                throw new \Exception('API key is missing in the .env file.');
            }

            $base64ApiKey = base64_encode($apiKey . ':');

            $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions')
                ->withHeader('Content-Type: application/json')
                ->withHeader('Accept: application/json')
                ->withHeader('Authorization: Basic ' . $base64ApiKey)
                ->withData($data)
                ->asJson()
                ->post();

            // Store session ID in the session for later reference
            \Session::put('session_id', $response->data->id);

            // Redirect to the PayMongo checkout URL
            return redirect()->to($response->data->attributes->checkout_url);
        } catch (\Exception $e) {
            \Log::error('PayMongo API Error:', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Handles the success callback from PayMongo and fetches session details.
     *
     * //@return void
     * @throws \Exception
     */
    public function success()
    {
        $sessionId = \Session::get('session_id');

        if (!$sessionId) {
            throw new \Exception('Session ID is missing.');
        }

        $apiKey = env('PAYMONGO_SECRET_KEY');

        if (!$apiKey) {
            throw new \Exception('API key is missing in the .env file.');
        }

        $base64ApiKey = base64_encode($apiKey . ':');

        $response = Curl::to("https://api.paymongo.com/v1/checkout_sessions/{$sessionId}")
            ->withHeader('Accept: application/json')
            ->withHeader('Authorization: Basic ' . $base64ApiKey)
            ->asJson()
            ->get();

        // Debug the response (use proper logging or return JSON in production)
        dd($response);
    }

    public function refund()
    {

        $data['data']['attributes']['amount']       = 5000;
        $data['data']['attributes']['payment_id']   = 'pay_sA83KrtmJUdue8prEHD6rZrY';
        $data['data']['attributes']['reason']       = 'duplicate';

        $response = Curl::to('https://api.paymongo.com/refunds')
                    ->withHeader('Content-Type: application/json')
                    ->withHeader('accept: application/json')
                    ->withHeader('Authorization: Basic '.env('PAYMONGO_SECRET_KEY'))
                    ->withData($data)
                    ->asJson()
                    ->post();

        dd($response);
    }

    public function refundStatus($id)
    {
        $response = Curl::to('https://api.paymongo.com/refunds/'.$id)
                ->withHeader('accept: application/json')
                ->withHeader('Authorization: Basic '.env('PAYMONGO_SECRET_KEY'))
                ->asJson()
                ->get();

        dd($response);
    }
}
