<?php

namespace App\Http\Controllers\Airlines;

use App\Models\Airline;
use Flugg\Responder\Contracts\Responder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DestroyAirlineController
{
    public function __invoke(int $id, Responder $responder): JsonResponse
    {
        try {
            $airline = Airline::findOrFail($id);
            $airline->delete();
            return $responder->success()->respond();
        } catch (ModelNotFoundException) {
            return $responder->error(JsonResponse::HTTP_NOT_FOUND, 'Airline not found.')->respond();
        }
    }
}
