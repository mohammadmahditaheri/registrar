<?php

namespace App\Domains\HttpErrorResponse\Jobs;

use App\Foundation\Contracts\Responses\ErrorResponseHandlerInterface;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * use this for validation errors as it sends 422 or
 * unprocessable entity error
 */
readonly final class ThrowUnprocessableEntityResponseJob
{
    public function __construct(
        private ErrorResponseHandlerInterface $errorResponseHandler
    )
    {}

    /**
     * @throws HttpResponseException
     */
    public function handle(string $message)
    {
        throw $this->errorResponseHandler->unprocessableEntity($message);
    }
}
