<?php

namespace App\Domain\Registration\States\Simplified;

use App\Domain\Registration\RegistrationContext;
use App\Domain\Registration\RegistrationStateInterface;
use App\Foundation\Enums\PlansEnum;
use App\Foundation\Enums\Steps\SimplifiedStepsEnum;

class QuickInfoState implements RegistrationStateInterface
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
        return SimplifiedStepsEnum::QUICK_INFO->value;
    }

    public static function canProceed(): bool
    {
        return count(self::getStepsConfig()) > (self::getOrder());
    }



    private static function getConfig(): array
    {
        return self::getStepsConfig()[SimplifiedStepsEnum::QUICK_INFO->value];
    }

    private static function getStepsConfig(): array
    {
        return config('registration.plans')[PlansEnum::SIMPLIFIED->value]['steps'];
    }

    private static function getOrder(): int
    {
        return self::getConfig()['order'];
    }
}