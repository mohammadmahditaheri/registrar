<?php

namespace App\Domains\Registration;

interface RegistrationStateInterface
{
    public function setContext(
        RegistrationContext $context,
    ): void;

    public function getIdentifier(): string;

    public function getValidationRules(): array;

    public function isEnd(): bool;

    public function getOrder(): int;

    public function canTransitionTo(
        string $destination
    ): bool;

//    public function setStepData($params): bool;
//    public function getStepFormData($params): bool;
}