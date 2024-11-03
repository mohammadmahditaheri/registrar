<?php

namespace App\Services\Registrar\Features\V1;

use App\Domains\Http\Jobs\SendJsonDataResponseJob;
use App\Domains\Registration\Jobs\FetchPlansJob;
use Illuminate\Http\Response;

readonly final class FetchPlansFeature
{
    public function __construct(
        private FetchPlansJob $fetchPlansJob,
        private SendJsonDataResponseJob $responseJob,
    )
    {
    }

    public function serve(): Response
    {
        $plans = $this->fetchPlansJob->handle();

        return $this->responseJob->handle($plans);
    }
}