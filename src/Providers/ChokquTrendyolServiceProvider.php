<?php

namespace Chokqu\Trendyol\Providers;

use Illuminate\Support\ServiceProvider;
use Chokqu\Trendyol\Clients\ChokquTrendyolClient;

class ChokquTrendyolServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        // Paket konfigürasyonunu birleştir.
        $this->mergeConfigFrom(__DIR__ . '/../../config/chokqu-trendyol.php', 'chokqu-trendyol');

        // Trendyol client nesnesini IoC container'a bind ediyoruz.
        $this->app->singleton(ChokquTrendyolClient::class, function ($app) {
            $config = $app['config']['chokqu-trendyol'];
            return new ChokquTrendyolClient($config);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Publish işlemleri: config dosyasını publish etmeye olanak tanıyalım.
        $this->publishes([
            __DIR__ . '/../../config/chokqu-trendyol.php' => config_path('chokqu-trendyol.php'),
        ], 'chokqu-trendyol-config');
    }
}
