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
        $airline = Airline::create([
            'name' => $request->string('name')->toString(),
            'description' => $request->string('description')->toString(),
        ]);

        return $responder->success($airline, new AirlineTransformer())->respond();
    }
}
