<?php

namespace App\Services;

use GuzzleHttp\Client;

class ApiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Make API request
     * 
     * @param string $method GET, POST, PUT, DELETE, etc.
     * @param string $url Full API URL
     * @param array $data Request data
     * @return array Response
     */
    public function makeRequest($method, $url, $data = [])
    {
        $options = [
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.api.token'),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
            'timeout' => 30,
        ];

        try {
            $response = $this->client->request($method, $url, $options);
            return [
                'success' => true,
                'status' => $response->getStatusCode(),
                'data' => json_decode($response->getBody()->getContents(), true)
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}
