<?php

namespace FRD\Providers;

use Illuminate\Support\ServiceProvider;
use FRD\Repositories\ClientRepositoryInterface;
use FRD\Repositories\ClientRepositoryEloquent;

class ClientRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClientRepositoryInterface::class, ClientRepositoryEloquent::class);
    }
}
