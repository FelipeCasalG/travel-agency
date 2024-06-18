<?php

namespace App\Transformers;

use App\Models\City;
use Flugg\Responder\Transformers\Transformer;

class CityTransformer extends Transformer
{
    /**
     * Transform the City model into a generic array.
     *
     * @param City $city
     *
     * @return array<string, mixed>
     */
    public function transform(City $city): array
    {
        return [
            'id' => (int) $city->id,
            'name' => (string) $city->name
        ];
    }
}
