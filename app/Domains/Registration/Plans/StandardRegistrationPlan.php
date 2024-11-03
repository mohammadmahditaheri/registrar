<?php

namespace App\Domains\Registration\Plans;

use App\Domains\Registration\RegistrationStateInterface;
use App\Domains\Registration\States\Standard\CompletionState;
use App\Domains\Registration\States\Standard\DocumentUploadState;
use App\Domains\Registration\States\Standard\PersonalInfoState;
use App\Domains\Registration\States\Standard\VerificationState;

class StandardRegistrationPlan implements RegistrationPlanInterface
{

    public function getStates(): array
    {
        return [
            'personal_info' => PersonalInfoState::class,
            'document_upload' => DocumentUploadState::class,
            'verification' => VerificationState::class,
            'completion' => CompletionState::class,
        ];
    }

    public function getInitialState(): string
    {
        return collect(
            $this->stepsFromConfig()
        )->first(function ($step) {
            return $step['order'] == 1;
        });
    }

    public function getName(): string
    {
        return config('registration.plans.standard.name');
    }

    private function stepsFromConfig(): array
    {
        return config('registration.plans.standard.steps');
    }
}
