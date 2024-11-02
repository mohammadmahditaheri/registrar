<?php

namespace App\Domain\Registration\Plans;

use App\Domain\Registration\States\Basic\CompletionState;
use App\Domain\Registration\States\Basic\DocumentUploadState;
use App\Domain\Registration\States\Basic\PersonalInfoState;
use App\Domain\Registration\States\Basic\VerificationState;

class BasicRegistrationPlan implements RegistrationPlanInterface
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
        return $this->getStates()['personal_info'];
    }

    public function getName(): string
    {
        return config('registration.plans.standard.name');
    }

    public function getValidationRules(): array
    {
        // TODO: Implement getValidationRules() method.
    }
}