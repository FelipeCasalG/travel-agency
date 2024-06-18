<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Models\City;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class CityController extends Controller
{
    public function index(): View
    {
        return view('cities.index');
    }

    public function getAll(): JsonResponse
    {
        $cities = City::paginate(8);
        return response()->json(['cities' => $cities], JsonResponse::HTTP_OK);
    }

    public function store(StoreCityRequest $request): JsonResponse
    {
        $city = City::create([
            'name' => $request->string('name')->toString(),
        ]);

        return response()->json($city, JsonResponse::HTTP_CREATED);
    }

    public function update(StoreCityRequest $request, int $id): JsonResponse
    {
        try {
            $city = City::findOrFail($id);
        } catch (ModelNotFoundException) {
            return response()->json(['error' => 'City not found'], JsonResponse::HTTP_NOT_FOUND);
        }

        $city->name = $request->string('name')->toString();
        $city->save();
        return response()->json($city, JsonResponse::HTTP_OK);
    }

    public function destroy(int $id): JsonResponse
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
