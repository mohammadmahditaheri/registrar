<?php

namespace App\Domains\Http\Jobs;

use App\Foundation\Contracts\Responses\ResponseHandlerInterface;
use Illuminate\Http\Response;

readonly final class SendJsonCreatedResourceResponseJob
{
    public function __construct(
        private ResponseHandlerInterface $responseHandler
    )
    {}

    /**
     * @param mixed|null $data
     * @param string|null $message
     * @param mixed $extra
     * @return Response
     */
    public function handle(
        mixed $data = null,
        ?string $message = null,
        mixed $extra = null
    ): Response
    {
        return $this->responseHandler->sendCreated(
            $data,
            $message,
            $extra
        );
    }
}
