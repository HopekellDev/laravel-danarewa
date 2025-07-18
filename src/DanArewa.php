<?php

namespace HopekellDev\DanArewa;

use HopekellDev\DanArewa\Helpers\IpeClearance;
use HopekellDev\DanArewa\Helpers\UserDetails;
use HopekellDev\DanArewa\Helpers\Validation;
use HopekellDev\DanArewa\Helpers\Verifications;

class DanArewa
{
    protected string $baseUrl;
    protected string $apiKey;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('danarewa.base_url'), '/');
        $this->apiKey = config('danarewa.api_key');
    }

    public function verifications(): Verifications
    {
        return new Verifications($this->apiKey, $this->baseUrl);
    }

    public function ipeClearance(): IpeClearance
    {
        return new IpeClearance($this->apiKey, $this->baseUrl);
    }

    public function validation(): Validation
    {
        return new Validation($this->apiKey, $this->baseUrl);
    }

    public function userDetails(): UserDetails
    {
        return new UserDetails($this->apiKey, $this->baseUrl);
    }
}
