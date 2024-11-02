<?php

namespace App\Domain\Registration\States\Basic;

use App\Domain\Registration\RegistrationContext;
use App\Domain\Registration\RegistrationStateInterface;

class CompletionState implements RegistrationStateInterface
{

    public function proceed(RegistrationContext $context): void
    {
        // TODO: Implement proceed() method.
    }

    public function rollback(RegistrationContext $context): void
    {
        // TODO: Implement rollback() method.
    }

    public function validate(array $data): bool
    {
        // TODO: Implement validate() method.
    }

    public function getNextState(): string
    {
        // TODO: Implement getNextState() method.
    }

    public function getIdentifier(): string
    {
        return 'completion';
    }
}