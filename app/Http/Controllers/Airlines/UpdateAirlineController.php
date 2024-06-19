<?php

namespace App\Http\Controllers\Airlines;

use App\Http\Requests\StoreAirlineRequest;
use App\Models\Airline;
use App\Transformers\AirlineTransformer;
use Flugg\Responder\Contracts\Responder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAirlineController
{
    public function __invoke(StoreAirlineRequest $request, int $id, Responder $responder): JsonResponse
    {
        try {
            $airline = Airline::findOrFail($id);
            $airline->name = $request->string('name')->toString();
            $airline->description = $request->string('description')->toString();
            $airline->save();
            return $responder->success($airline, new AirlineTransformer())->respond();
        } catch (ModelNotFoundException) {
            return $responder->error(JsonResponse::HTTP_NOT_FOUND, 'Airline not found.')->respond();
        }
    }
}
