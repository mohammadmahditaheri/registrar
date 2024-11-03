<?php

namespace App\Data\Repositories;

use App\Data\Models\RegistrationPlan;
use Illuminate\Support\Collection;

class FetchPlansRepository
{
    public function get(): Collection
    {
        return RegistrationPlan::query()
            ->select([
                'id',
                'name',
                'description'
            ])->get();
    }
}