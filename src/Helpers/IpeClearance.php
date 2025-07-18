<?php

namespace HopekellDev\DanArewa\Helpers;

use Illuminate\Support\Facades\Http;

/**
 * DanArewa's Identity Verification laravel package
 * @author Hope Ezenwa- Hopekell <hopekelltech@gmail.com>
 * @version 1
 **/


class IpeClearance
{
    protected string $apiKey;
    protected string $baseUrl;

    /**
     * Construct
     */
    public function __construct(string $apiKey, string $baseUrl)
    {
        $this->apiKey = $apiKey;
        $this->baseUrl = $baseUrl;
    }

    /**
     * ✔️ IPE Clearance - Instantly
     *
     * @param string $trackingID
     * @return array|null
     */
    public function ipeClearance(string $trackingID): ?array
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
            'Content-Type'  => 'application/json',
        ])->post("{$this->baseUrl}/ipe/", [
            'number' => $trackingID,
        ]);

        return $response->json() ?? null;
    }

    /**
     * ✅ IPE Clearance - status check
     *
     * @param string $trackingID
     * @return array|null
     */
    public function ipeClearanceStatus(string $trackingID): ?array
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
            'Content-Type'  => 'application/json',
        ])->post("{$this->baseUrl}/ipe/status", [
            'number' => $trackingID,
        ]);

        return $response->json() ?? null;
    }

}