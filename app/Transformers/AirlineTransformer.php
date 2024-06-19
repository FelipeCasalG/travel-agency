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
            'id' => (int) $airline->id,
            'name' => (string) $airline->name,
            'description' => (string) $airline->description,
        ];
    }
}
