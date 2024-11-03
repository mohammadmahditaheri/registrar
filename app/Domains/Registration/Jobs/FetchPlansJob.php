<?php

namespace App\Domains\Registration\Jobs;

use App\Data\Repositories\FetchPlansRepository;
use Illuminate\Support\Collection;

readonly final class FetchPlansJob
{
    public function __construct(
        private FetchPlansRepository $repository
    )
    {}

    /**
     * @return Collection
     */
    public function handle(): Collection
    {
        return $this->repository->get();
    }
}