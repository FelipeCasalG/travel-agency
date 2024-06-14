<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function index()
    {
        return view('cities.index');
    }

    public function all()
    {
        $cities = City::all();
        return response()->json(['cities' => $cities]);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255|unique:cities,name',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages()
            ], 400);
        }

        $city = City::create([
            'name' => $request->input('name'),
        ]);

        return response()->json($city, 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $city = City::find($id);

        if (! $city) {
            return response()->json(['error' => 'City not found'], 404);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255|unique:cities,name',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages()
            ], 400);
        }

        $city->name = $request->input('name');
        $city->save();
        return response()->json($city, 200);
    }

    public function destroy($id): JsonResponse
    {
        $city = City::find($id);
        if ($city) {
            $city->delete();
            return response()->json('City deleted successfully', 200);
        } else {
            return response()->json(['error' => 'City not found'], 404);
        }
    }
}
