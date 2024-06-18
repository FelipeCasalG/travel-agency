<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Models\City;
use Illuminate\Http\JsonResponse;

class CreateCityController extends Controller
{
    public function execute(StoreCityRequest $request): JsonResponse
    {
        $city = City::create([
            'name' => $request->string('name')->toString(),
        ]);

        return response()->json($city, JsonResponse::HTTP_CREATED);
    }
}
