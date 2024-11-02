<?php

namespace App\Enums\Steps;

enum SimplifiedStepsEnum: string
{
    case QUICK_INFO = 'quick_info';
    case VERIFICATION = 'simplified_verification';
    case COMPLETION = 'completion';
}
