<?php

namespace HopekellDev\DanArewa\Helpers;

use Illuminate\Support\Facades\Http;

/**
 * DanArewa's Identity Verification Laravel Package
 * 
 * @author Hope Ezenwa
 * @version 1.0.0
 */

class Verifications
{
    protected string $apiKey;
    protected string $baseUrl;

    public function __construct(string $apiKey, string $baseUrl)
    {
        $this->apiKey = $apiKey;
        $this->baseUrl = rtrim($baseUrl, '/'); // Ensure no trailing slash
    }

    /**
     * Verify NIN number
     *
     * @param string $nin
     * @return array|null
     */
    public function ninVerification(string $nin): ?array
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
            'Content-Type'  => 'application/json',
        ])->post("{$this->baseUrl}/nin/", [
            'number' => $nin,
        ]);

        return $response->json() ?? null;
    }

    /**
     * Verify NIN by phone number
     *
     * @param string $phone
     * @return array|null
     */
    public function phoneVerification(string $phone): ?array
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
            'Content-Type'  => 'application/json',
        ])->post("{$this->baseUrl}/phone/", [
            'number' => $phone,
        ]);

        return $response->json() ?? null;
    }

    /**
     * Verify BVN by number
     *
     * @param string $bvn
     * @return array|null
     */
    public function bvnVerification(string $bvn): ?array
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
            'Content-Type'  => 'application/json',
        ])->post("{$this->baseUrl}/bvn/", [
            'number' => $bvn,
        ]);

        return $response->json() ?? null;
    }

    /**
     * Verify NIN by Tracking ID
     *
     * @param string $trackingId
     * @return array|null
     */
    public function trackingIdVerification(string $trackingId): ?array
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
            'Content-Type'  => 'application/json',
        ])->post("{$this->baseUrl}/tracking-id/", [
            'number' => $trackingId,
        ]);

        return $response->json() ?? null;
    }
}
