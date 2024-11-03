<?php

namespace App\Domains\Registration\Plans;

use App\Domains\Registration\RegistrationStateInterface;

interface RegistrationPlanInterface
{
    /**
     * @return string<RegistrationStateInterface>
     */
    public static function getInitialState(): string;
}