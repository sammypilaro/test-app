<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(
        //     'App\Services\Contracts\UserInterface',
        //     'App\Services\UserServiceProvider'
        // );

        $this->app->bind(
            'App\Services\Contracts\HttpClientInterface',
            'App\Services\HttpClientServiceProvider'
        );

        $this->app->bind(
            'App\Strategies\Contracts\UserServiceInterface',
            'App\Strategies\UserServiceStrategy'
        );

        $this->app->bind(
            'App\Services\Contracts\RandomDataInterface',
            'App\Services\RandomDataAPIServiceProvider'
        );

        $this->app->bind(
            'App\Services\Contracts\RandomDataInterface',
            'App\Services\RandomUserServiceProvider'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
