<?php

namespace App\Domain\Registration\Plans;

use App\Domain\Registration\RegistrationStateInterface;
use App\Domain\Registration\States\Standard\CompletionState;
use App\Domain\Registration\States\Standard\DocumentUploadState;
use App\Domain\Registration\States\Standard\PersonalInfoState;
use App\Domain\Registration\States\Standard\VerificationState;

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

    public function getValidationRules(
        string|RegistrationStateInterface $step
    ): array
    {
        // if ($step instanceof RegistrationStateInterface) {
        //     $step->
        // }

        // return config('registration.plans.standard')['']
    }

    private function stepsFromConfig(): array
    {
        return config('registration.plans.standard.steps');
    }
}
