<?php

namespace App\Domain\Registration;

interface RegistrationStateInterface
{
    public function proceed(RegistrationContext $context): void;

    public function rollback(RegistrationContext $context): void;

    public function validate(array $data): bool;

    public function getNextState(): string;
}