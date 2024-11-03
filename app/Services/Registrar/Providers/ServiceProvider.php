<?php

namespace App\Services\Registrar\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Register service stuff.
     *
     * @return void
     */
    public function register(): void
    {
         $this->app->register(RouteServiceProvider::class);
    }

    public function boot()
    {
    }

}
