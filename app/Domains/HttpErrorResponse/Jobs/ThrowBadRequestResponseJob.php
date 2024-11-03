<?php

namespace App\Domains\HttpErrorResponse\Jobs;

use App\Foundation\Contracts\Responses\ErrorResponseHandlerInterface;
use Illuminate\Http\Exceptions\HttpResponseException;

readonly final class ThrowBadRequestResponseJob
{
    public function __construct(
        private ErrorResponseHandlerInterface $responseHandler
    )
    {}

    /**
     * @throws HttpResponseException
     */
    public function handle(
        string $message = null,
        mixed $extra = null
    )
    {
        throw $this->responseHandler->badRequest($message, $extra);
    }
}
