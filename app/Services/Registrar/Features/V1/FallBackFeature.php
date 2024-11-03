<?php

namespace App\Services\Registrar\Features\V1;

use App\Domains\HttpErrorResponse\Jobs\ThrowNotFoundResponseJob;
use Illuminate\Http\Response;

readonly final class FallBackFeature
{
    public function __construct(
        private ThrowNotFoundResponseJob $errorResponseJob
    )
    {
    }

    /**
     * This feature will be presented as a fallback action
     *
     * @return Response
     */
    public function serve(): Response
    {
        throw $this->errorResponseJob->handle();
    }
}
