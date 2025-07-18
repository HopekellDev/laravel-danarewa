<?php

namespace HopekellDev\DanArewa\Helpers;

use Illuminate\Support\Facades\Http;

class Validation
{
    protected string $apiKey;
    protected string $baseUrl;

    public function __construct(string $apiKey, string $baseUrl)
    {
        $this->apiKey = $apiKey;
        $this->baseUrl = $baseUrl;
    }

    /**
     * Validate ID - Instantly
     *
     * @param string $nin
     * @return array|null
     */
    public function validate(string $nin): ?array
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
            'Content-Type'  => 'application/json',
        ])->post("{$this->baseUrl}/val/", [
            'number' => $nin,
        ]);

        return $response->json() ?? null;
    }

    /**
     * Check validation status
     *
     * @param string $nin
     * @return array|null
     */
    public function validateStatus(string $nin): ?array
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
            'Content-Type'  => 'application/json',
        ])->post("{$this->baseUrl}/val/status", [
            'number' => $nin,
        ]);

        return $response->json() ?? null;
    }
}
