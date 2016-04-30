<?php

namespace FRD\Providers;

use FRD\Repositories\ProjectNoteRepositoryEloquent;
use FRD\Repositories\ProjectNoteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ProjectNoteRepositoryProvider extends ServiceProvider
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
        $this->app->bind(ProjectNoteRepositoryInterface::class, ProjectNoteRepositoryEloquent::class);
    }
}
