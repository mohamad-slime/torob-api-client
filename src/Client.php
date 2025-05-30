<?php

namespace TorobApiClient;

use TorobApiClient\Exceptions\ApiException;
use TorobApiClient\HttpClient;

/**
 * Torob API Client
 *
 * Provides methods to interact with the Torob API for searching products and retrieving data.
 */
class Client
{
    private $httpClient;
    private $config;

    /**
     * Client constructor.
     *
     * @param Config $config Configuration object with API key and base URL.
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->httpClient = new HttpClient($config->getBaseUrl());
    }

    /**
     * Search for products using a query string.
     *
     * @param string $query The search query.
     * @param array $params Additional parameters (e.g., page, limit).
     * @return array The API response data.
     * @throws ApiException If the API request fails.
     */
    public function search(string $query, array $params = []): array
    {
        $params['q'] = $query;

        try {
            return $this->httpClient->get('base-product/search/', $params);
        } catch (\Exception $e) {
            throw new ApiException('Search request failed: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Get product details by ID.
     *
     * @param string $productId The product ID.
     * @return array The API response data.
     * @throws ApiException If the API request fails.
     */
    public function getProduct(string $productId): array
    {
        try {

            $params = ["prk" => $productId];
            return $this->httpClient->get("/products", $params);
        } catch (\Exception $e) {
            throw new ApiException('Product request failed: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }
}
