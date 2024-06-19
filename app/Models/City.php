<?php

namespace App\Models;

use Database\Factories\CityFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class City extends Model
{
    protected $guarded = ['id'];

    /**
     * @return BelongsToMany<Airline>
     */
    public function airlines(): BelongsToMany
    {
        return $this->belongsToMany(Airline::class);
    }

    /**
     * Get the factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
     */
    public static function newFactory(): Factory
    {
        return CityFactory::new();
    }
}
