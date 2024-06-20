<?php

namespace App\Transformers;

use App\Models\Airline;
use Flugg\Responder\Transformers\Transformer;

class AirlineTransformer extends Transformer
{
    /**
     * Transform the Airline model into a generic array.
     *
     *
     * @return array<string, mixed>
     */
    public function transform(Airline $airline): array
    {
        return [
            'id' => $airline->id,
            'name' => $airline->name,
            'description' => $airline->description,
        ];
    }
}
