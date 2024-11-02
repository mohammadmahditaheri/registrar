<?php

namespace App\Domain\Registration\Plans;

interface RegistrationPlanInterface
{
    public function getStates(): array;
    public function getInitialState(): string;
    public function getName(): string;
    public function getValidationRules(): array;
}