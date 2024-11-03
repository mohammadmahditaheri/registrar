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
                    'validation' => [
                        'name' => 'required|string',
                        'email' => 'required|email',
                        'phone' => 'required|string',
                    ],
                    'destinations' => [
                        StandardSteps::DOCUMENT_UPLOAD->value,
                        StandardSteps::COMPLETION->value,
                    ]
                ],
                StandardSteps::DOCUMENT_UPLOAD->value => [
                    'order' => 2,
                    'external_system' => true,
                    'destinations' => [
                        StandardSteps::VERIFICATION->value,
                    ]
                ],
                StandardSteps::VERIFICATION->value => [
                    'order' => 3,
                    'external_system' => true,
                    'destinations' => [
                        StandardSteps::PERSONAL_INFO->value,
                        StandardSteps::COMPLETION->value,
                    ]
                ],
                StandardSteps::COMPLETION->value => [
                    'order' => 4,
                    'external_system' => false,

                    // if empty it's an end of story
                    'destinations' => []
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
                    'external_system' => false,
                    'validation' => [
                        'email' => 'required|email',
                    ],
                    'destinations' => [
                        SimplifiedSteps::VERIFICATION->value,
                    ]
                ],
                SimplifiedSteps::VERIFICATION->value => [
                    'order' => 2,
                    'external_system' => true,
                    'destinations' => [
                        SimplifiedSteps::COMPLETION->value,
                    ]
                ],
                SimplifiedSteps::COMPLETION->value => [
                    'order' => 3,
                    'external_system' => false,
                    'destinations' => [] // end
                ]
            ]
        ]
    ]
];