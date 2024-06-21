<?php

namespace App\Http\Controllers\Cities;

use App\Models\City;
use Flugg\Responder\Contracts\Responder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DestroyCityController
{
    public function __invoke(int $id, Responder $responder): JsonResponse
    {
        try {
            $city = City::findOrFail($id);
            $city->delete();
            return $responder->success()->respond();
        } catch (ModelNotFoundException) {
            return $responder->error(JsonResponse::HTTP_NOT_FOUND, 'City not found.')->respond();
        }
    }
}
