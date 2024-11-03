<?php

namespace App\Domains\Http\Jobs;

use App\Foundation\Contracts\Responses\ResponseHandlerInterface;
use Illuminate\Http\Response;

readonly final class SendJsonResponseJob
{
    public function __construct(
        private ResponseHandlerInterface $responseHandler
    )
    {}

    /**
     * Send json response with both data and message
     *
     * Use this with caution as it is in most cases
     * a bad practice for a RESTful API endpoint to
     * be used both to 'read' and 'mutate' the server
     * state at the same time. Use it only when
     * you know what you are doing.
     *
     * @param mixed $data
     * @param string|null $message
     * @param mixed $extra
     * @param int|null $statusCode
     * @return Response
     */
    public function handle(
        mixed $data = null,
        string $message = null,
        mixed $extra = null,
        ?int $statusCode = null,
    ): Response
    {
        return $this->responseHandler->send(
            data: $data,
            message: $message,
            extra: $extra,
            statusCode: $statusCode
        );
    }
}
