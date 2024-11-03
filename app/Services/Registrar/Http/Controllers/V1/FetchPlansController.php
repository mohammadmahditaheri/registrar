<?php

namespace App\Services\Registrar\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\Registrar\Features\V1\FetchPlansFeature;
use Illuminate\Http\Response;

final class FetchPlansController extends Controller
{
    public function __construct(
        private readonly FetchPlansFeature $feature
    )
    {
    }

    public function __invoke(): Response
    {
        return $this->feature->serve();
    }
}
