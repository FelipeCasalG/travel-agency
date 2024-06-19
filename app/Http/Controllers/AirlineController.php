<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Transformers\AirlineTransformer;
use Flugg\Responder\Contracts\Responder;
use Illuminate\Http\JsonResponse;

class GetAllAirlinesController extends Controller
{
    public function __invoke(Responder $responder): JsonResponse
    {
        $airlines = Airline::paginate(8);
        return $responder->success($airlines, new AirlineTransformer())->respond();
    }
}
