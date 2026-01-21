<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
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
            'timeout' => 30,
        ];
        if (strtoupper($method) === 'GET') {
            $options['query'] = $data;
        } else {
            $options['json'] = $data;
        }

        try {
            $response = $this->client->request($method, $url, $options);
            $responseBody = $response->getBody()->getContents();
            // Log::info("API Request", [
            //     'method' => $method,
            //     'url' => $url,
            //     'query' => $data
            // ]);
            //Log::info("API Request ApiService.php: {$method} {$url}", $data);
            //Log::info("API Response ApiService.php: " . $responseBody);
            $decodedResponse = json_decode($responseBody, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                //Log::error('JSON Decode Error: ' . json_last_error_msg());
                return [
                    'success' => false,
                    'error' => 'Invalid JSON response from API: ' . json_last_error_msg(),
                    'raw_response' => $responseBody
                ];
            }
            if (isset($decodedResponse['error'])) {
                return [
                    'success' => false,
                    'error' => $decodedResponse['error'],
                    'data' => $decodedResponse
                ];
            }
            
            return [
                'success' => true,
                'status' => $response->getStatusCode(),
                'data' => $decodedResponse
            ];
            
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBody = $response->getBody()->getContents();
            $decodedError = json_decode($responseBody, true);
            
            Log::error("API Client Error ApiService.php: {$method} {$url} - Status: " . $e->getCode());
            Log::error("API Error Response: " . $responseBody);
            
            $errorMessage = 'API Error';
            if (isset($decodedError['error'])) {
                $errorMessage = $decodedError['error'];
            } elseif ($e->getCode() === 400) {
                $errorMessage = 'Bad Request';
            } elseif ($e->getCode() === 401) {
                $errorMessage = 'Unauthorized';
            } elseif ($e->getCode() === 403) {
                $errorMessage = 'Forbidden';
            } elseif ($e->getCode() === 404) {
                $errorMessage = 'Not Found';
            }            
            return [
                'success' => false,
                'error' => $errorMessage,
                'status_code' => $e->getCode(),
                'data' => $decodedError
            ];
            
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            Log::error("API Request Exception ApiService.php: {$method} {$url} - " . $e->getMessage());            
            return [
                'success' => false,
                'error' => 'Request failed: ' . $e->getMessage()
            ];
            
        } catch (\Exception $e) {
            Log::error("API General Error ApiService.php: {$method} {$url} - " . $e->getMessage());
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}
