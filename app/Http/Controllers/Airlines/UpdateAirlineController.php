<?php

namespace App\Http\Controllers\Airlines;

use App\Http\Requests\StoreAirlineRequest;
use App\Models\Airline;
use App\Transformers\AirlineTransformer;
use Flugg\Responder\Contracts\Responder;
use Illuminate\Http\JsonResponse;

class UpdateAirlineController
{
    public function __invoke(StoreAirlineRequest $request, Airline $airline, Responder $responder): JsonResponse
    {
        $airline->update($request->validated());
        return $responder
            ->success($airline, AirlineTransformer::class)
            ->respond();
    }
}
