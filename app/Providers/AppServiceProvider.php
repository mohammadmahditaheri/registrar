<?php

namespace App\Providers;

use App\Domains\Registration\Plans\StandardRegistrationPlan;
use App\Domains\Registration\RegistrationContext;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // currently for simplicity and preventing over complexity
        // only standard-specific context will be provided
        $this->app->singleton(
            RegistrationContext::class, function (Application $app) {
            return new RegistrationContext(
                resolve(StandardRegistrationPlan::class)
            );
        });

        // for other contexts or controllers or classes the other context
        // will be provided
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
