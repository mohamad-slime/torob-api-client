<?php

namespace TorobApiClient;

use GuzzleHttp\Client as GuzzleClient;

class HttpClient
{
    private $client;
    public function __construct(string $baseUrl)
    {
        $this->client = new GuzzleClient([
            'base_uri' => $baseUrl,
            'timeout' => 10,
            'verify' => false,
            'error' => false,
        ]);
    }
    public function get(string $endpoint, array $params = []): array
    {
        try {
            $response = $this->client->get($endpoint, ['query' => $params]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Handle the exception (e.g., log the error, return an error response, etc.)
            return ['error' => $e->getMessage()];
        }
    }
}
