<?php

namespace App\Domains\Registration\Plans;

use App\Domains\Registration\States\Simplified\QuickInfoState;
use App\Domains\Registration\States\Simplified\SimpleCompletionState;
use App\Domains\Registration\States\Simplified\SimplifiedVerificationState;

class SimplifiedRegistrationPlan implements RegistrationPlanInterface
{
    public function getInitialState(): string
    {
        // TODO: Implement getInitialState() method.
    }
}