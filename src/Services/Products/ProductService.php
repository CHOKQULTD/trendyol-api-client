<?php

namespace Chokqu\Trendyol\Services\Products;

use Chokqu\Trendyol\Clients\ChokquTrendyolClient;

class ProductService
{
    protected ChokquTrendyolClient $client;

    public function __construct(ChokquTrendyolClient $client)
    {
        $this->client = $client;
    }

    /**
     * Trendyol'daki ürün listesini getirir
     */
    public function list(array $filters = [])
    {
        // Trendyol dokümantasyonundaki ilgili endpoint
        $endpoint = 'suppliers/{supplierId}/products';
        return $this->client->get($endpoint, $filters);
    }

    /**
     * Yeni ürün ekleme
     */
    public function create(array $productData)
    {
        $endpoint = 'suppliers/{supplierId}/v2/products';
        return $this->client->post($endpoint, $productData);
    }
}
