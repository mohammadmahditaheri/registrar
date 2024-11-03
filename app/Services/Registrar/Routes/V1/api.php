<?php

use App\Services\Registrar\Http\Controllers\V1\FetchPlansController;
use App\Services\Registrar\Http\Controllers\V1\ProceedToNextStepController;
use App\Services\Registrar\Http\Controllers\V1\RollbackToPreviousStepController;
use App\Services\Registrar\Http\Controllers\V1\ShowRegistrationSessionController;
use App\Services\Registrar\Http\Controllers\V1\StartRegistrationSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Registrar Service - API Routes
|--------------------------------------------------------------------------
|
| All bellow routes are prefixed with api/v1/registrar in
| App/Services/Registrar/Providers/RouteServiceProvider
|
*/

// Controllers should live in App/Services/Registrar/Http/Controllers

Route::prefix('/plans')->group(function () {
    // retrieve registration plans
    Route::get('/', FetchPlansController::class);

    // start a registration based on a plan
    Route::post('/{id}/start', StartRegistrationSessionController::class);
});


Route::prefix('/registration-sessions')->group(function () {
    // get the ongoing registration session
    Route::get('/{id}', ShowRegistrationSessionController::class);

    // proceed to next step if possible
    Route::patch('/{id}/next', ProceedToNextStepController::class);

    // go to previous step if possible
    Route::patch('/{id}/prev', RollbackToPreviousStepController::class);
});

