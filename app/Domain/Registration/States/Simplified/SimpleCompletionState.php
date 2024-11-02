<?php

namespace App\Domain\Registration\States\Simplified;

use App\Domain\Registration\RegistrationContext;
use App\Domain\Registration\RegistrationStateInterface;
use App\Enums\Steps\SimplifiedStepsEnum;

class SimpleCompletionState implements RegistrationStateInterface
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
        return SimplifiedStepsEnum::COMPLETION->value;
    }
}