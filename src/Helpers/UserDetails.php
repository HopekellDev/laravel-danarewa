<?php

namespace HopekellDev\DanArewa\Helpers;

use Illuminate\Support\Facades\Http;

/**
 * DanArewa's Identity Verification laravel package
 * @author Hope Ezenwa- Hopekell <hopekelltech@gmail.com>
 * @version 1
 **/

class UserDetails
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
     * Get user's wallet balance
     *
     * @return array|null
     */
    public function walletBalance(): ?array
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
            'Content-Type'  => 'application/json',
        ])->get("{$this->baseUrl}/user/wallet");

        return $response->json() ?? null;
    }

}