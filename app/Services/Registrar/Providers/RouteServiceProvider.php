<?php

namespace App\Services\Registrar\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    private string $servicePath = 'app/Services/Registrar/';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function map(): void
    {
        $this->mapApiRoutes();
    }

    /**
     * Defines the "api" routes for the module.
     *
     * @return void
     */
    private function mapApiRoutes(): void
    {
        Route::prefix('api/v1/registrar')
            ->middleware('api')
            ->group(base_path(
                $this->servicePath . 'Routes/V1/api.php'
            ));
    }
}
