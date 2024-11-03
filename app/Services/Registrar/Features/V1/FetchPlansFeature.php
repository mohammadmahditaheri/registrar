<?php

namespace App\Services\Registrar\Features\V1;

use App\Domains\Http\Jobs\SendJsonDataResponseJob;
use App\Domains\Registration\Jobs\FetchPlansJob;
use App\Services\Registrar\Http\Resources\RegistrationPlanResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

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

        return $this->respond($plans);
    }

    private function respond(Collection $plans): Response
    {
        return $this->responseJob->handle(
            $this->serialize($plans)
        );
    }

    private function serialize(Collection $plans): AnonymousResourceCollection
    {
        return RegistrationPlanResource::collection($plans);
    }
}