<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Chokqu\Trendyol\Clients\ChokquTrendyolClient;

class ChokquTrendyolClientTest extends TestCase
{
    public function test_client_initialization()
    {
        $client = new ChokquTrendyolClient([
            'api_key' => 'test_key',
            'api_secret' => 'test_secret',
            'base_uri' => 'https://api.trendyol.com/sapigw/',
        ]);

        $this->assertInstanceOf(ChokquTrendyolClient::class, $client);
    }

    // Burada Guzzle isteklerini mock'layarak istek/cevap akışını test edebilirsiniz.
}
