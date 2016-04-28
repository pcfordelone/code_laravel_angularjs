<?php

namespace FRD\Providers;

use FRD\Repositories\ProjectRepositoryEloquent;
use FRD\Repositories\ProjectRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ProjectRepositoryProvider extends ServiceProvider
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
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepositoryEloquent::class);
    }
}
