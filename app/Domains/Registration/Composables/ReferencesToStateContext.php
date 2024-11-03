<?php

namespace App\Domains\Registration\Composables;

use App\Domains\Registration\RegistrationContext;

trait ReferencesToStateContext
{
    private RegistrationContext $context;

    public function setContext(
        RegistrationContext $context
    ): void
    {
        $this->context = $context;
    }
}