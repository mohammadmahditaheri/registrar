<?php

namespace App\Domains\Registration\States\Standard;

use App\Domains\Registration\Composables\InteractsWithStateConfig;
use App\Domains\Registration\Composables\ReferencesToStateContext;
use App\Domains\Registration\RegistrationStateInterface;
use App\Foundation\Enums\Steps\StandardStepsEnum;

class VerificationState implements RegistrationStateInterface
{
    use ReferencesToStateContext,
        InteractsWithStateConfig;

    public function getIdentifier(): string
    {
        return StandardStepsEnum::VERIFICATION->value;
    }

    /**
     * @return array{
     *     order: int,
     *     external_system: bool,
     *     destinations: bool
     * }
     */
    public function getConfig(): array
    {
        return $this->getStepConfig(
            step: StandardStepsEnum::VERIFICATION->value,
        );
    }
}