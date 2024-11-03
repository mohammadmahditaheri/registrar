<?php

namespace App\Foundation\Contracts\Responses;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response as LaravelResponse;
use Symfony\Component\HttpFoundation\Response;

interface ErrorResponseHandlerInterface
{
    /**
     * throw a Bad request http exception
     *
     * @throws HttpResponseException
     */
    public function badRequest(
        string $message = null,
        mixed $extra = null
    );

    /**
     * throw unprocessable entity http exception
     *
     * @param string $message
     * @throws HttpResponseException
     */
    public function unprocessableEntity(string $message);

    /**
     * throw forbidden http exception
     *
     * @throws HttpResponseException
     */
    public function unauthorized(?string $message = null);

    /**
     * throw unauthenticated http exception
     *
     * @throws HttpResponseException
     */
    public function unauthenticated(?string $message = null);

    /**
     * throw a not found http exception
     *
     * @param string|null $message
     * @throws HttpResponseException
     */
    public function notFoundError(?string $message = null);

    /**
     * @param string $message
     * @param int $statusCode
     * @param mixed|null $extra
     * @throws HttpResponseException
     */
    public function errorResponse(
        string $message,
        int $statusCode = Response::HTTP_NOT_FOUND,
        mixed $extra = null
    );

    /**
     * ---------------------------------------------------
     * ------------------ Raw Responses ------------------
     * ---------------------------------------------------
     */

    public function rawBadRequest(
        string $message = null,
        mixed  $extra = null
    ): LaravelResponse;

    public function rawUnprocessableEntity(
        string $message
    ): LaravelResponse;

    public function rawUnauthorized(
        ?string $message = null
    ): LaravelResponse;

    public function rawUnauthenticated(
        ?string $message = null
    ): LaravelResponse;

    public function rawNotFound(
        ?string $message = null
    ): LaravelResponse;

    public function rawErrorResponse(
        string $message,
        int    $statusCode = Response::HTTP_NOT_FOUND,
        mixed  $extra = null
    ): LaravelResponse;
}
