<?php

namespace App\Domains\HttpErrorResponse\Jobs;

use App\Foundation\Contracts\Responses\ErrorResponseHandlerInterface;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

readonly final class ThrowErrorResponseJob
{
    public function __construct(
        private ErrorResponseHandlerInterface $responseHandler
    )
    {
    }

    /**
     * @param string|null $message
     * @param int|null $statusCode
     * @param mixed|null $extra
     * @throws HttpResponseException
     */
    public function handle(
        ?string $message = null,
        ?int $statusCode = Response::HTTP_NOT_FOUND,
        mixed $extra = null
    ): mixed
    {
        throw $this->responseHandler->errorResponse(
            $message, $statusCode, $extra
        );
    }
}
