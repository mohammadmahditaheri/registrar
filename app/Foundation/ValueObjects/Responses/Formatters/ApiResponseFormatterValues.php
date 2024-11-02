<?php

namespace App\Foundation\ValueObjects\Responses\Formatters;

use App\Foundation\ValueObjects\Responses\ResponseValues;

/**
 * This class is in charge of formatting
 * the outer layer or response body
 */
class ApiResponseFormatterValues extends ResponseValues
{
    public function getBody(): array
    {
        return [
            'status' => $this->getStatus(),
            'status_code' => $this->getStatusCode(),
            'data' => $this->getData(),
            'message' => $this->getMessage(),
            'extra' => $this->getExtra()
        ];
    }
}
