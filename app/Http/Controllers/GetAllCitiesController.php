<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Transformers\CityTransformer;
use Flugg\Responder\Contracts\Responder;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetAllCitiesController extends Controller
{
    public function __invoke(Request $request, Responder $responder): JsonResponse
    {
        $sort = $request->query('sort', 'id');
        $order = $request->query('order') === 'desc' ? 'desc' : 'asc';
        try {
            // had to add this check form phpstan to pass the test
            if (! is_string($sort)) {
                $sort = 'id';
            }
            $cities = City::orderBy((string) $sort, $order)->paginate(8);
            return $responder->success($cities, new CityTransformer())->respond();
        } catch (QueryException) {
            return $responder->error(JsonResponse::HTTP_BAD_REQUEST, 'Invalid query parameters.')->respond();
        }
    }
}
