<?php

namespace App\Domains\HttpErrorResponse\Jobs;

use App\Foundation\Contracts\Responses\ErrorResponseHandlerInterface;
use Illuminate\Http\Exceptions\HttpResponseException;

readonly final class ThrowUnauthenticatedResponseJob
{
    public function __construct(
        private ErrorResponseHandlerInterface $responseHandler
    )
    {}

    /**
     * @param string|null $message
     * @throws HttpResponseException
     */
    public function handle(?string $message = null)
    {
        throw $this->responseHandler->unauthenticated($message);
    }
}
