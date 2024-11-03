<?php

namespace App\Domains\Registration\States\Simplified;

use App\Domains\Registration\Composables\ReferencesToStateContext;
use App\Domains\Registration\RegistrationStateInterface;
use App\Foundation\Enums\Steps\SimplifiedStepsEnum;

class QuickInfoState implements RegistrationStateInterface
{
    use ReferencesToStateContext;

    public function getIdentifier(): string
    {
        return SimplifiedStepsEnum::QUICK_INFO->value;
    }
}