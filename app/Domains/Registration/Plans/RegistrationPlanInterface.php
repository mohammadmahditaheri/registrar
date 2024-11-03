<?php

namespace App\Domains\Registration\Plans;

interface RegistrationPlanInterface
{
    public function getStates(): array;
    public function getInitialState(): string;
    public function getName(): string;
}