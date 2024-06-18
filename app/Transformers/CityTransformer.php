<?php

namespace App\Transformers;

use App\Models\City;
use Flugg\Responder\Transformers\Transformer;

class CityTransformer extends Transformer
{
    public function transform(City $city): array
    {
        /**
         * Transform the City model into a generic array.
         *
         * @param City $city
         *
         * @return array<string, mixed>
         */
        return [
            'id' => (int) $city->id,
            'name' => (string) $city->name
        ];
    }
}
