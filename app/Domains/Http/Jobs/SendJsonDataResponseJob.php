<?php

namespace App\Domains\Http\Jobs;

use App\Foundation\Contracts\Responses\ResponseHandlerInterface;
use Illuminate\Http\Response;

readonly final class SendJsonDataResponseJob
{
    public function __construct(
        private ResponseHandlerInterface $responseHandler
    )
    {}

    /**
     * @param mixed $data
     * @param mixed $extra
     * @return Response
     */
    public function handle(
        mixed $data,
        mixed $extra = null
    ): Response
    {
        return $this->responseHandler->sendData($data, $extra);
    }
}
