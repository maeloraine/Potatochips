<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class PayMongoService
{
    protected $baseUrl = 'https://api.paymongo.com';
    protected $authHeader;

    public function __construct()
    {
        // Encode the API key for Basic Auth
        $this->authHeader = 'Basic ' . base64_encode(env('PAYMONGO_SECRET_KEY') . ':');
    }

    /**
     * Create a checkout session.
     *
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function createCheckoutSession(array $data)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => $this->authHeader,
        ])->post("{$this->baseUrl}/v1/checkout_sessions", $data);

        if ($response->failed()) {
            throw new Exception('PayMongo API request failed: ' . $response->body());
        }

        return $response->json();
    }

    /**
     * Get checkout session details.
     *
     * @param string $sessionId
     * @return array
     * @throws Exception
     */
    public function getCheckoutSession(string $sessionId)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => $this->authHeader,
        ])->get("{$this->baseUrl}/v1/checkout_sessions/{$sessionId}");

        if ($response->failed()) {
            throw new Exception('PayMongo API request failed: ' . $response->body());
        }

        return $response->json();
    }

    /**
     * Create a refund.
     *
     * @param array $data
     * @return array
     * @throws Exception
     */
    // public function createRefund(array $data)
    // {
    //     $response = Http::withHeaders([
    //         'Content-Type' => 'application/json',
    //         'Accept' => 'application/json',
    //         'Authorization' => $this->authHeader,
    //     ])->post("{$this->baseUrl}/refunds", $data);

    //     if ($response->failed()) {
    //         throw new Exception('PayMongo API request failed: ' . $response->body());
    //     }

    //     return $response->json();
    // }
}