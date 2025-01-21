<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PayMongoService
{
    protected $client;
    protected $publicKey;
    protected $secretKey;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.paymongo.com/v1/',
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

       // $this->publicKey = env('PAYMONGO_PUBLIC_KEY');
        $this->secretKey = env('PAYMONGO_SECRET_KEY');
    }

    public function createPaymentIntent($amount, $currency = 'PHP')
    {
        try {
            $response = $this->client->post('payment_intents', [
                'auth' => [$this->secretKey, ''],
                'json' => [
                    'data' => [
                        'attributes' => [
                            'amount' => $amount * 100, // PayMongo expects amount in cents
                            'currency' => $currency,
                            'payment_method_allowed' => ['card', 'gcash', 'grab_pay'],
                            'payment_method_options' => [
                                'card' => [
                                    'request_three_d_secure' => 'any',
                                ],
                            ],
                        ],
                    ],
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return $e->getResponse()->getBody()->getContents();
        }
    }
}