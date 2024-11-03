<?php

namespace App\Foundation\Enums;

enum MessagesEnum: string
{
    /**
     * Success messages
     */
    /* General */
    case SUCCESS_RESOURCE_CREATED = 'success_resource_created';
    case SUCCESS_RESOURCE_UPDATED = 'success_resource_updated';
    case SUCCESS_RESOURCE_DELETED = 'success_resource_deleted';

    /**
     * Error messages
     */
    case ERROR_GENERIC = 'error_generic';
    case ERROR_UNAUTHORIZED_GENERIC = 'error_unauthorized_generic';
    case ERROR_UNAUTHENTICATED = 'error_unauthenticated';
    case ERROR_NOT_FOUND_GENERIC = 'error_not_found_generic';
}
