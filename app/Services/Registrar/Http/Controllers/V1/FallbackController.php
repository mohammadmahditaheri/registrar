<?php

namespace App\Services\Registrar\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\Registrar\Features\V1\FallBackFeature;
use Illuminate\Http\Response;

final class FallbackController extends Controller
{
    public function __construct(
        private readonly FallBackFeature $feature
    )
    {
    }

    public function __invoke(): Response
    {
        return $this->feature->serve();
    }
}
