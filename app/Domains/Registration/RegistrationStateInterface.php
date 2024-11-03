<?php

namespace App\Domains\Registration;

interface RegistrationStateInterface
{
    public function setContext(
        RegistrationContext $context,
    ): void;

    public function getIdentifier(): string;
}