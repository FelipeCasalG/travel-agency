<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DestroyCityController extends Controller
{
    public function execute(int $id): JsonResponse
    {
        try {
            $city = City::findOrFail($id);
            $city->delete();
            return response()->json('City deleted successfully', JsonResponse::HTTP_OK);
        } catch (ModelNotFoundException) {
            return response()->json(['error' => 'City not found'], JsonResponse::HTTP_NOT_FOUND);
        }
    }
}
