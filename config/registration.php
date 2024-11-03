<?php

use App\Domains\Registration\Plans\SimplifiedRegistrationPlan;
use App\Domains\Registration\Plans\StandardRegistrationPlan;
use App\Foundation\Enums\PlansEnum;
use App\Foundation\Enums\Steps\SimplifiedStepsEnum as SimplifiedSteps;
use App\Foundation\Enums\Steps\StandardStepsEnum as StandardSteps;

return [
    'plans' => [
        PlansEnum::STANDARD->value => [
            'class' => StandardRegistrationPlan::class,
            'name' => 'Standard Registration',

            /**
             * ------------------
             * ------States------
             * ------------------
             */
            'steps' => [
                StandardSteps::PERSONAL_INFO->value => [
                    'order' => 1,
                    'can_rollback' => false,
                    'validation' => [
                        'name' => 'required|string',
                        'email' => 'required|email',
                        'phone' => 'required|string',
                    ]
                ],
                StandardSteps::DOCUMENT_UPLOAD->value => [
                    'order' => 2,
                    'can_rollback' => true,
                    'external_system' => true,
                ],
                StandardSteps::VERIFICATION->value => [
                    'order' => 3,
                    'can_rollback' => true,
                    'external_system' => true,
                ],
                StandardSteps::COMPLETION->value => [
                    'can_rollback' => true,
                    'order' => 4,
                ],
            ]
        ],

        PlansEnum::SIMPLIFIED->value => [
          'class' => SimplifiedRegistrationPlan::class,
            'name' => 'Quick Registration',

            /**
             * ------------------
             * ------States------
             * ------------------
             */
            'steps' => [
                SimplifiedSteps::QUICK_INFO->value => [
                    'order' => 1,
                    'validation' => [
                        'email' => 'required|email',
                    ]
                ],
                SimplifiedSteps::VERIFICATION->value => [
                    'order' => 2,
                    'external_system' => true,
                ],
                SimplifiedSteps::COMPLETION->value => [
                    'order' => 3,
                ]
            ]
        ]
    ]
];