<?php

namespace App\Domain\Registration;

use App\Domain\Registration\RegistrationStateInterface;
use App\Domain\Registration\Plans\RegistrationPlanInterface;

class RegistrationContext
{
    private RegistrationStateInterface $currentState;
    private RegistrationPlanInterface $plan;

    private array $registrationData = [];
    private string $currentStep;

    public function __construct(
        RegistrationPlanInterface $plan
    ) {
        $this->setPlan($plan);
        $this->currentState = $this->resolveInitialState();
    }

    private function resolveInitialState(): RegistrationStateInterface
    {
        // TODO implement
        // return $this->getPlan()->getInitialState();
    }

    public function getPlan(): RegistrationPlanInterface
    {
        return $this->plan;
    }

    public function getCurrentStep(): string
    {
        return $this->currentStep;
    }

    public function isStepValid(string $step): bool
    {
        // TODO implement
    }

    public function getNextValidStep(): ?string
    {
        // TODO implement
    }

    /**
     * ---------------------------------------------------
     * ------------------Private Methods------------------
     * ---------------------------------------------------
     */

    private function setPlan(RegistrationPlanInterface $plan): void
    {
        $this->plan = $plan;
    }
}
