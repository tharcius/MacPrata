<?php

namespace MacPrata\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\MacPrata\Repositories\PersonRepository::class, \MacPrata\Repositories\PersonRepositoryEloquent::class);
        //:end-bindings:
    }
}
