<?php

namespace App\Http\Controllers\Airlines;

use App\Models\Airline;
use Flugg\Responder\Contracts\Responder;
use Illuminate\Http\JsonResponse;

class DestroyAirlineController
{
    public function __invoke(Airline $airline, Responder $responder): JsonResponse
    {
        $airline->delete();

        return $responder
            ->success()
            ->respond(JsonResponse::HTTP_NO_CONTENT);
    }
}
