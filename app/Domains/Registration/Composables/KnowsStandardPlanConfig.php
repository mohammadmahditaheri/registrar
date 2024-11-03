<?php

namespace App\Domains\Registration\Composables;

use App\Foundation\Enums\PlansEnum;
use App\Foundation\Enums\Steps\StandardStepsEnum;

trait KnowsStandardPlanConfig
{

    protected function getConfig(): array
    {
        return config(
            'registration.plans.' . PlansEnum::STANDARD->value
        );
    }

    protected function getPersonalInfoStepConfig(): array
    {
        return $this->getStepConfig(
            step: StandardStepsEnum::PERSONAL_INFO->value
        );
    }

    protected function getDocumentUploadStepConfig(): array
    {
        return $this->getStepConfig(
            step: StandardStepsEnum::DOCUMENT_UPLOAD->value
        );
    }

    protected function getVerificationStepConfig(): array
    {
        return $this->getStepConfig(
            step: StandardStepsEnum::VERIFICATION->value
        );
    }

    protected function getCompletionStepConfig(): array
    {
        return $this->getStepConfig(
            step: StandardStepsEnum::COMPLETION->value
        );
    }

    private function getStepConfig(
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