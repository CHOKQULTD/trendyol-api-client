<?php

namespace Chokqu\Trendyol\Clients;

use GuzzleHttp\Client;
use Chokqu\Trendyol\Exceptions\ChokquTrendyolApiException;

class ChokquTrendyolClient
{
    protected Client $httpClient;
    protected array $config;

    public function __construct(array $config)
    {
        $this->config = $config;

        $this->httpClient = new Client([
            'base_uri' => $this->config['base_uri'] ?? 'https://api.trendyol.com/sapigw/',
            'headers'  => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Basic ' . base64_encode(
                    $this->config['api_key'].':'.$this->config['api_secret']
                ),
            ],
        ]);
    }

    /**
     * GET isteği
     */
    public function get(string $uri, array $query = [])
    {
        try {
            $response = $this->httpClient->request('GET', $uri, [
                'query' => $query,
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            throw new ChokquTrendyolApiException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * POST isteği
     */
    public function post(string $uri, array $body = [])
    {
        try {
            $response = $this->httpClient->request('POST', $uri, [
                'json' => $body,
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            throw new ChokquTrendyolApiException($e->getMessage(), $e->getCode(), $e);
        }
    }

    // Dilerseniz put, patch, delete gibi metodlar da eklenebilir.
}
