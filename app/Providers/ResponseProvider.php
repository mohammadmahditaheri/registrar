<?php

namespace App\Providers;

use App\Foundation\Contracts\Responses\ErrorResponseHandlerInterface;
use App\Foundation\Contracts\Responses\ResponseHandlerInterface;
use App\Foundation\Handlers\Responses\ApiErrorResponseHandler;
use App\Foundation\Handlers\Responses\ApiResponseHandler;
use Illuminate\Support\ServiceProvider;

class ResponseProvider extends ServiceProvider
{
    /**
     * All the Response bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        ResponseHandlerInterface::class => ApiResponseHandler::class,
        ErrorResponseHandlerInterface::class => ApiErrorResponseHandler::class
    ];
}
