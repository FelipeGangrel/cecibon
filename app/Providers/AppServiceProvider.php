<?php

namespace App\Providers;

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
        $this->app->bind(\App\Repositories\UserRepositoryInterface::class, function($app) {
            return new \App\Repositories\UserRepository(
                $app['em'],
                $app['em']->getClassMetaData(\App\Entities\User::class)
            );
        });

        $this->app->bind(\App\Repositories\ProductRepositoryInterface::class, function($app) {
            return new \App\Repositories\ProductRepository(
                $app['em'],
                $app['em']->getClassMetaData(\App\Entities\Product::class)
            );
        });
    }
}
