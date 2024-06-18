<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Transformers\CityTransformer;
use Flugg\Responder\Contracts\Responder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetAllCitiesController extends Controller
{
    public function execute(Request $request, Responder $responder): JsonResponse
    {
        $sort = $request->query('sort', 'id');
        $order = $request->query('order', 'asc');
        // sort and paginate by 8 the cities
        $cities = City::orderBy($sort, $order)->paginate(8);
        return $responder->success($cities, CityTransformer::class)->respond();
    }
}
