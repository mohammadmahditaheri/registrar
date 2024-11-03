<?php

namespace App\Foundation\Enums\Steps;

use App\Domains\Registration\RegistrationStateInterface;
use App\Domains\Registration\States\Standard\CompletionState;
use App\Domains\Registration\States\Standard\DocumentUploadState;
use App\Domains\Registration\States\Standard\PersonalInfoState;
use App\Domains\Registration\States\Standard\VerificationState;

enum StandardStepsEnum: string
{
    case PERSONAL_INFO = 'personal_info';
    case DOCUMENT_UPLOAD = 'document_upload';
    case VERIFICATION = 'verification';
    case COMPLETION = 'completion';

    public static function getStateClass(
        string $stateIdentifier
    ): false|string
    {
        return match ($stateIdentifier) {
            self::PERSONAL_INFO->value => PersonalInfoState::class,
            self::DOCUMENT_UPLOAD->value => DocumentUploadState::class,
            self::VERIFICATION->value => VerificationState::class,
            self::COMPLETION->value => CompletionState::class,
            default => false
        };
    }
}
