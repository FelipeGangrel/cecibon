<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Entities\User;

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
        $this->app->bind(UserRepositoryInterface::class, function($app) {
            return new UserRepository(
                $app['em'],
                $app['em']->getClassMetaData(User::class)
            );
        });
    }
}
