<?php

namespace App\Domains\HttpErrorResponse\Jobs;

use App\Foundation\Contracts\Responses\ErrorResponseHandlerInterface;
use App\Foundation\Enums\MessagesEnum as Messages;

readonly final class ThrowNotFoundResponseJob
{
    public function __construct(
        private ErrorResponseHandlerInterface $errorResponseHandler
    )
    {}

    /**
     * @param string|null $resource
     */
    public function handle(?string $resource = null)
    {
        throw $this->errorResponseHandler->notFoundError(
            $this->message($resource)
        );
    }

    /**
     * @param string|null $resource
     * @return string
     */
    private function message(string $resource = null): string
    {
        return ($resource !== null)
            ? __(Messages::ERROR_NOT_FOUND->value,
                ['resource' => $resource]
            )
            : __(Messages::ERROR_NOT_FOUND_GENERIC->value);
    }
}
