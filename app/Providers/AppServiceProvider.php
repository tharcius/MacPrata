<?php

namespace MacPrata\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\MacPrata\Repositories\PersonRepository::class, \MacPrata\Repositories\PersonRepositoryEloquent::class);
        $this->app->bind(\MacPrata\Repositories\EquipmentRepository::class, \MacPrata\Repositories\EquipmentRepositoryEloquent::class);
        $this->app->bind(\MacPrata\Repositories\ServiceRepository::class, \MacPrata\Repositories\ServiceRepositoryEloquent::class);
        $this->app->bind(\MacPrata\Repositories\OrderRepository::class, \MacPrata\Repositories\OrderRepositoryEloquent::class);
        $this->app->bind(\MacPrata\Repositories\ProductRepository::class, \MacPrata\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\MacPrata\Repositories\OrderRepository::class, \MacPrata\Repositories\OrderRepositoryEloquent::class);
    }
}
