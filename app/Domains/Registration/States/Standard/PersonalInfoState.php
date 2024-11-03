<?php

namespace App\Domains\Registration\States\Standard;

use App\Domains\Registration\Composables\ReferencesToStateContext;
use App\Domains\Registration\RegistrationStateInterface;
use App\Foundation\Enums\Steps\StandardStepsEnum;

class PersonalInfoState implements RegistrationStateInterface
{
    use ReferencesToStateContext;

    public function getIdentifier(): string
    {
        return StandardStepsEnum::PERSONAL_INFO->value;
    }
}