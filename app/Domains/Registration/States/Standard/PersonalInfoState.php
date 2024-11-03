<?php

namespace App\Domains\Registration\States\Standard;

use App\Domains\Registration\Composables\InteractsWithStateConfig;
use App\Domains\Registration\Composables\ReferencesToStateContext;
use App\Domains\Registration\RegistrationStateInterface;
use App\Foundation\Enums\Steps\StandardStepsEnum;

class PersonalInfoState implements RegistrationStateInterface
{
    use ReferencesToStateContext,
        InteractsWithStateConfig;

    public function getIdentifier(): string
    {
        return StandardStepsEnum::PERSONAL_INFO->value;
    }

    /**
     * @inheritDoc
     */
    public function getConfig(): array
    {
        return $this->getStepConfig(
            step: StandardStepsEnum::PERSONAL_INFO->value
        );
    }
}