<?php

namespace App\Domains\Registration\Composables;

use App\Foundation\Enums\PlansEnum;

trait InteractsWithStateConfig
{
    abstract /**
     * @return array{
     *     order: int,
     *     external_system: bool,
     *     destinations: bool
     * }
     */
    public function getConfig(): array;

    public function getValidationRules(): array
    {
        if (!isset($this->getConfig()['validation'])) {
            return [];
        }

        return $this->getConfig()['validation'];
    }

    public function getOrder(): int
    {
        return $this->getConfig()['order'];
    }

    public function isEnd(): bool
    {
        if (!isset($this->getConfig()['destinations'])) {
            return true;
        }

        return count($this->getConfig()['destinations']) == 0;
    }

    public function canTransitionTo(
        string $destination
    ): bool
    {
        return in_array(
            $destination,
            $this->getConfig()['destinations']
        );
    }

    /**
     * ---------------------------------------------------
     * ------------------Private Methods------------------
     * ---------------------------------------------------
     */

    protected function getStepConfig(
        string $step
    ): array
    {
        return config(
            'registration.plans.' . PlansEnum::STANDARD->value .
            '.steps.' .
            $step
        );
    }
}