<?php

namespace App\Domains\Registration\Plans;

use App\Domains\Registration\RegistrationStateInterface;
use App\Domains\Registration\States\Standard\CompletionState;
use App\Domains\Registration\States\Standard\DocumentUploadState;
use App\Domains\Registration\States\Standard\PersonalInfoState;
use App\Domains\Registration\States\Standard\VerificationState;
use App\Foundation\Enums\PlansEnum;
use App\Foundation\Enums\Steps\StandardStepsEnum;

class StandardRegistrationPlan implements RegistrationPlanInterface
{

    /**
     * @return string<RegistrationStateInterface>
     */
    public static function getInitialState(): string
    {
        foreach (self::getSteps() as $key => $step) {
            if (isset($step['order']) && $step['order'] == 1) {
                return StandardStepsEnum::getStateClass($key);
            }
        }
    }

    public function getName(): string
    {
        return config('registration.plans.standard.name');
    }

    private static function getSteps(): array
    {
        return self::getConfig()['steps'];
    }

    private static function getConfig() : array
    {
        return config(
            'registration.plans.' .
            PlansEnum::STANDARD->value
        );
    }
}
