<?php
namespace KarGo;

use Illuminate\Support\ServiceProvider;

class KarGoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/kargo.php', 'kargo');
        $this->app->singleton(Client::class, function ($app) { return new Client($app['config']->get('kargo', [])); });
        $this->app->bind(\KarGo\Services\FileService::class, function ($app) { return new \KarGo\Services\FileService($app->make(Client::class)); });
        $this->app->bind(\KarGo\Services\ProductService::class, function ($app) { return new \KarGo\Services\ProductService($app->make(Client::class)); });
        $this->app->bind(\KarGo\Services\WarehouseService::class, function ($app) { return new \KarGo\Services\WarehouseService($app->make(Client::class)); });
        $this->app->bind(\KarGo\Services\CloudInventoryService::class, function ($app) { return new \KarGo\Services\CloudInventoryService($app->make(Client::class)); });
        $this->app->bind(\KarGo\Services\DfStockService::class, function ($app) { return new \KarGo\Services\DfStockService($app->make(Client::class)); });
        $this->app->bind(\KarGo\Services\PoOrderService::class, function ($app) { return new \KarGo\Services\PoOrderService($app->make(Client::class)); });
        $this->app->bind(\KarGo\Services\DfOrderService::class, function ($app) { return new \KarGo\Services\DfOrderService($app->make(Client::class)); });
        $this->app->bind(\KarGo\Services\ShippingOrderService::class, function ($app) { return new \KarGo\Services\ShippingOrderService($app->make(Client::class)); });
        $this->app->bind(\KarGo\Services\CloudOutboundService::class, function ($app) { return new \KarGo\Services\CloudOutboundService($app->make(Client::class)); });
        $this->app->bind(\KarGo\Services\AdInvoiceService::class, function ($app) { return new \KarGo\Services\AdInvoiceService($app->make(Client::class)); });
        $this->app->bind(\KarGo\Services\CoopInvoiceService::class, function ($app) { return new \KarGo\Services\CoopInvoiceService($app->make(Client::class)); });
        $this->app->bind(\KarGo\Services\ChargebackService::class, function ($app) { return new \KarGo\Services\ChargebackService($app->make(Client::class)); });
    }

    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/kargo.php' => config_path('kargo.php')], 'kargo-config');
    }
}
