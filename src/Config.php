<?php

namespace TorobApiClient;

class Config
{   
    private $baseUrl;
    public function __construct(string $baseUrl = 'https://api.torob.com/v4/')
    {
        $this->baseUrl = rtrim($baseUrl, '/');
    }
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }
}
