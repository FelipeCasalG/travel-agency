<?php

namespace App\Http\Controllers\Airlines;

use App\Models\Airline;
use App\Transformers\AirlineTransformer;
use Flugg\Responder\Contracts\Responder;
use Illuminate\Http\JsonResponse;

class GetAllAirlinesController
{
    public function __invoke(Responder $responder): JsonResponse
    {
        $airlines = Airline::paginate(8);

        return $responder
            ->success($airlines, AirlineTransformer::class)
            ->respond();
    }
}
