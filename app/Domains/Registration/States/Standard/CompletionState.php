<?php

namespace App\Domains\Registration\States\Standard;

use App\Domains\Registration\Composables\ReferencesToStateContext;
use App\Domains\Registration\RegistrationContext;
use App\Domains\Registration\RegistrationStateInterface;
use App\Foundation\Enums\Steps\StandardStepsEnum;

class CompletionState implements RegistrationStateInterface
{
    use ReferencesToStateContext;

    private RegistrationContext $context;

    public function getIdentifier(): string
    {
        return StandardStepsEnum::COMPLETION->value;
    }
}