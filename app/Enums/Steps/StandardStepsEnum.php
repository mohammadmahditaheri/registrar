<?php

namespace App\Enums\Steps;

enum StandardStepsEnum: string
{
    case PERSONAL_INFO = 'personal_info';
    case DOCUMENT_UPLOAD = 'document_upload';
    case VERIFICATION = 'verification';
    case COMPLETION = 'completion';
}
