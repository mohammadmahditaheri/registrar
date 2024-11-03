<?php

namespace App\Domains\Registration;

use App\Domains\Registration\Plans\RegistrationPlanInterface;

class RegistrationContext
{
    private RegistrationStateInterface $currentState;
    private RegistrationPlanInterface $plan;

    public function __construct(
        RegistrationPlanInterface $plan
    ) {
        $this->setPlan($plan);
        $this->currentState = $this->resolveInitialState();
        $this->currentState->setContext($this);
    }

    public function transitionTo(
        RegistrationStateInterface $to
    ): bool
    {
        if ($this->currentState->canTransitionTo(
            $to->getIdentifier()
        )) {
            $this->currentState = $to;
            $this->currentState->setContext($this);

            return true;
        }

        return false;
    }

    private function resolveInitialState(): RegistrationStateInterface
    {
        return resolve($this->getPlan()->getInitialState());
    }

    /**
     * Provides validation rules to be used in form request or validators
     *
     * @return array
     */
    public function getValidationRules(): array
    {
        return $this->currentState->getValidationRules();
    }

    /**
     * ---------------------------------------------------
     * ------------------Private Methods------------------
     * ---------------------------------------------------
     */

    private function getPlan(): RegistrationPlanInterface
    {
        return $this->plan;
    }

    private function setPlan(RegistrationPlanInterface $plan): void
    {
        $this->plan = $plan;
    }
}
