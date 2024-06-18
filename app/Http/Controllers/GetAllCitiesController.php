<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Transformers\CityTransformer;
use Flugg\Responder\Contracts\Responder;
use Illuminate\Http\JsonResponse;

class GetAllCitiesController extends Controller
{
    public function execute(Responder $responder): JsonResponse
    {
        return $responder->success(City::paginate(8), new CityTransformer())->respond();
    }
}
