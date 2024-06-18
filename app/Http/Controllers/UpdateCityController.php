<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Models\City;
use App\Transformers\CityTransformer;
use Flugg\Responder\Contracts\Responder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateCityController extends Controller
{
    public function __invoke(StoreCityRequest $request, int $id, Responder $responder): JsonResponse
    {
        try {
            $city = City::findOrFail($id);
            $city->name = $request->string('name')->toString();
            $city->save();
            return $responder->success($city, new CityTransformer())->respond();
        } catch (ModelNotFoundException) {
            return $responder->error(JsonResponse::HTTP_NOT_FOUND, 'City not found.')->respond();
        }
    }
}
