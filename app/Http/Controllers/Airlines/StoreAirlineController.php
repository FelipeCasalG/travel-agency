<?php

namespace App\Http\Controllers\Airlines;

use App\Http\Requests\StoreAirlineRequest;
use App\Models\Airline;
use App\Transformers\AirlineTransformer;
use Flugg\Responder\Contracts\Responder;
use Illuminate\Http\JsonResponse;

class StoreAirlineController
{
    public function __invoke(StoreAirlineRequest $request, Responder $responder): JsonResponse
    {
        $airline = Airline::create($request->validated());

        return $responder
            ->success($airline, AirlineTransformer::class)
            ->respond(JsonResponse::HTTP_CREATED);
    }
}
