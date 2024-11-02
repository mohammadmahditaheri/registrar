<?php

use App\Domain\Registration\Plans\BasicRegistrationPlan;
use App\Domain\Registration\Plans\SimplifiedRegistrationPlan;

return [
    'plans' => [
        'standard' => [
            'class' => BasicRegistrationPlan::class,
            'name' => 'Standard Registration',

            /**
             * ------------------
             * ------States------
             * ------------------
             */
            'steps' => [
                'personal_info' => [
                    'order' => 1,
                    'validation' => [
                        'name' => 'required|string',
                        'email' => 'required|email',
                        'phone' => 'required|string',
                    ]
                ],
                'document_upload' => [
                    'order' => 2,
                    'external_system' => true,
                ],
                'verification' => [
                    'order' => 3,
                    'external_system' => true,
                ],
                'completion' => [
                    'order' => 4,
                ],
            ]
        ],

        'simplified' => [
          'class' => SimplifiedRegistrationPlan::class,
            'name' => 'Quick Registration',

            /**
             * ------------------
             * ------States------
             * ------------------
             */
            'steps' => [
                'quick_info' => [
                    'order' => 1,
                    'validation' => [
                        'email' => 'required|email',
                    ]
                ],
                'simplified_verification' => [
                    'order' => 2,
                    'external_system' => true,
                ],
                'completion' => [
                    'order' => 3,
                ]
            ]
        ]
    ]
];