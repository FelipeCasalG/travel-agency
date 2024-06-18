<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\JsonResponse;

class GetAllCitiesController extends Controller
{
    public function execute(): JsonResponse
    {
        $cities = City::paginate(8);
        return response()->json(['cities' => $cities], JsonResponse::HTTP_OK);
    }
}
