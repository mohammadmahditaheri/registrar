<?php

namespace App\Domains\Http\Jobs;

use App\Foundation\Contracts\Responses\ResponseHandlerInterface;
use Illuminate\Http\Response;

readonly final class SendJsonMessageResponseJob
{
    public function __construct(
        private ResponseHandlerInterface $responseHandler
    )
    {}

    /**
     * @param string $message
     * @param mixed $extra
     * @return Response
     */
    public function handle(
        string $message,
        mixed $extra = null
    ): Response
    {
        return $this->responseHandler->sendMessage($message, $extra);
    }
}
