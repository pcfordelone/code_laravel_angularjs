<?php

namespace FRD\Providers;

use FRD\Repositories\ProjectTaskRepositoryEloquent;
use FRD\Repositories\ProjectTaskRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ProjectTaskRepositoryProvider extends ServiceProvider
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
        $this->app->bind(ProjectTaskRepositoryInterface::class, ProjectTaskRepositoryEloquent::class);
    }
}
