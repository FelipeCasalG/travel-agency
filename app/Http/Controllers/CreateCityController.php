<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Models\City;
use App\Transformers\CityTransformer;
use Flugg\Responder\Contracts\Responder;
use Illuminate\Http\JsonResponse;

class CreateCityController extends Controller
{
    public function __invoke(StoreCityRequest $request, Responder $responder): JsonResponse
    {
        $city = City::create([
            'name' => $request->string('name')->toString(),
        ]);

        return $responder->success($city, new CityTransformer())->respond();
    }
}
