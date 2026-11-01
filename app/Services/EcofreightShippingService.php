<?php 
// app/Services/EcofreightShippingService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EcofreightShippingService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.ecofreight.base_url');
        $this->apiKey = config('services.ecofreight.api_key');
        
        if (empty($this->baseUrl) || empty($this->apiKey)) {
            throw new \RuntimeException('Ecofreight API configuration is missing');
        }
    }

    public function createShipment(array $payload)
    {
        try {
        $endpoint = rtrim($this->baseUrl, '/') . '/v2/api/client/order';
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post($endpoint, $payload);

        Log::debug('Ecofreight API Request', [
            'url' => $endpoint, 
            'payload' => $payload,
            'response_status' => $response->status(),
            'response_body' => $response->body(),
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        if ($response->status() === 401) {
            throw new \Exception('Invalid API credentials');
        }

        Log::error('Ecofreight API Error', [
            'status' => $response->status(),
            'error' => $response->body(),
        ]);

        return null;

    } catch (\Exception $e) {
        Log::error('Ecofreight API Exception', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        throw $e;
    }
    }
}