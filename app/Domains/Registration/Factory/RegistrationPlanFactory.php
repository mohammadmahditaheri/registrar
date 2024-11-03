<?php

namespace App\Domains\Registration\Factory;

use App\Domains\Registration\Plans\RegistrationPlanInterface;
use App\Exceptions\Registration\InvalidPlanException;

class RegistrationPlanFactory
{
    private array $plans = [];

    public function registerPlan(
        string $planId,
        RegistrationPlanInterface $plan,
    ): void
    {
        $this->plans[$planId] = $plan;
    }

    /**
     * @param string $planId
     * @return RegistrationPlanInterface
     * @throws InvalidPlanException
     */
    public function createPlan(
        string $planId,
    ): RegistrationPlanInterface
    {
        if (!isset($this->plans[$planId])) {
            throw new InvalidPlanException("Plan $planId does not exist");
        }

        return $this->plans[$planId];
    }
}