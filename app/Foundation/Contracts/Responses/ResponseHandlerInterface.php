<?php

namespace App\Foundation\Contracts\Responses;

use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

interface ResponseHandlerInterface
{
    /**
     * @param mixed $data
     * @param string $message
     * @param mixed|null $extra
     * @param int|null $statusCode
     * @return Response
     */
    public function send(
        mixed $data,
        string $message,
        mixed $extra = null,
        ?int $statusCode = SymfonyResponse::HTTP_OK
    ): Response;

    /**
     * @param mixed $data
     * @param string|null $message
     * @param mixed|null $extra
     * @return Response
     */
    public function sendCreated(
        mixed $data,
        string $message = null,
        mixed $extra = null
    ): Response;

    /**
     * Don't send any 4xx or 5xx status codes with this
     * as they have a separate response handler contract
     * named ErrorResponseHandlerInterface
     *
     * @param string $message
     * @param mixed|null $extra
     * @param int $statusCode
     * @return Response
     */
    public function sendMessage(
        string $message,
        mixed $extra = null,
        int $statusCode = SymfonyResponse::HTTP_OK
    ): Response;



    /**
     * @param mixed $data
     * @param mixed|null $extra
     * @return Response
     */
    public function sendData(
        mixed $data,
        mixed $extra = null
    ): Response;
}
