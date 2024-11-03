<?php

namespace App\Domains\Registration\Plans;

use App\Domains\Registration\States\Simplified\QuickInfoState;
use App\Domains\Registration\States\Simplified\SimpleCompletionState;
use App\Domains\Registration\States\Simplified\SimplifiedVerificationState;

class SimplifiedRegistrationPlan implements RegistrationPlanInterface
{
    public function getStates(): array
    {
        return [
            'quick_info' => QuickInfoState::class,
            'simplified_verification' => SimplifiedVerificationState::class,
            'completion' => SimpleCompletionState::class,
        ];
    }

    public function getInitialState(): string
    {
        // TODO: Implement getInitialState() method.
    }

    public function getName(): string
    {
        // TODO: Implement getName() method.
    }
}