<?php

namespace App\Domains\Registration\States\Simplified;

use App\Domains\Registration\RegistrationStateInterface;
use App\Domains\Registration\Composables\ReferencesToStateContext;
use App\Foundation\Enums\Steps\SimplifiedStepsEnum;

class SimpleCompletionState implements RegistrationStateInterface
{
    use ReferencesToStateContext;

    public function getIdentifier(): string
    {
        return SimplifiedStepsEnum::COMPLETION->value;
    }
}