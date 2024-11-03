<?php

namespace App\Foundation\Handlers\Responses;

use App\Foundation\Contracts\Responses\ErrorResponseHandlerInterface;
use App\Foundation\Enums\MessagesEnum as Messages;
use App\Foundation\Enums\ResponseStatusesEnums;
use App\Foundation\ValueObjects\Responses\Formatters\ApiResponseFormatterValues;
use App\Foundation\ValueObjects\Responses\ResponseValues;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response as LaravelResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiErrorResponseHandler implements ErrorResponseHandlerInterface
{
    /**
     * @inheritDoc
     */
    public function badRequest(
        string $message = null,
        mixed  $extra = null
    )
    {
        throw new HttpResponseException(
            $this->rawBadRequest(
                message: $message, extra: $extra
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function unprocessableEntity(string $message)
    {
        throw new HttpResponseException(
            $this->rawUnprocessableEntity($message)
        );
    }

    /**
     * @inheritDoc
     */
    public function unauthorized(?string $message = null)
    {
        throw new HttpResponseException(
            $this->rawUnauthorized($message)
        );
    }

    /**
     * @inheritDoc
     */
    public function unauthenticated(?string $message = null)
    {
        throw new HttpResponseException(
            $this->rawUnauthenticated($message)
        );
    }

    /**
     * @inheritDoc
     */
    public function notFoundError(?string $message = null)
    {
        throw new HttpResponseException(
            $this->rawNotFound($message)
        );
    }

    /**
     * @@inheritDoc
     */
    public function errorResponse(
        string $message,
        int    $statusCode = Response::HTTP_NOT_FOUND,
        mixed  $extra = null
    )
    {
        throw new HttpResponseException(
            $this->rawErrorResponse(
                message: $message,
                statusCode: $statusCode,
                extra: $extra
            )
        );
    }

    /**
     * ---------------------------------------------------
     * ------------------ Raw Responses ------------------
     * ---------------------------------------------------
     */

    public function rawBadRequest(
        string $message = null,
        mixed  $extra = null
    ): LaravelResponse
    {
        return $this->rawErrorResponse(
            message: $message ?? __(Messages::ERROR_GENERIC->value),
            statusCode: Response::HTTP_BAD_REQUEST,
            extra: $extra,
        );
    }

    public function rawUnprocessableEntity(
        string $message
    ): LaravelResponse
    {
        return $this->rawErrorResponse(
            message: $message,
            statusCode: Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }

    public function rawUnauthorized(
        ?string $message = null
    ): LaravelResponse
    {
        return $this->rawErrorResponse(
            message: $message ?? __(Messages::ERROR_UNAUTHORIZED_GENERIC->value),
            statusCode: Response::HTTP_FORBIDDEN
        );
    }

    public function rawUnauthenticated(
        ?string $message = null
    ): LaravelResponse
    {
        return $this->rawErrorResponse(
            message: $message ?? __(Messages::ERROR_UNAUTHENTICATED->value),
            statusCode: Response::HTTP_UNAUTHORIZED
        );
    }

    public function rawNotFound(
        ?string $message = null
    ): LaravelResponse
    {
        return $this->rawErrorResponse(
            message: $message ??
            __(Messages::ERROR_NOT_FOUND_GENERIC->value),
        );
    }

    public function rawErrorResponse(
        string $message,
        int    $statusCode = Response::HTTP_NOT_FOUND,
        mixed  $extra = null
    ): LaravelResponse
    {
        $errorResponseValues = $this->assemble(
            message: $message,
            statusCode: $statusCode,
            extra: $extra
        );

        return response(
            content: $errorResponseValues->getBody(),
            status: $errorResponseValues->getStatusCode()
        );
    }

    /**
     * ---------------------------------------------------
     * ----------------- Private Methods -----------------
     * ---------------------------------------------------
     */

    private function assemble(
        ?string $message = null,
        int     $statusCode = Response::HTTP_NOT_FOUND,
        mixed   $extra = null
    ): ResponseValues
    {
        return new ApiResponseFormatterValues(
            status: ResponseStatusesEnums::ERROR,
            statusCode: $statusCode,
            message: $message,
            extra: $extra
        );
    }
}
