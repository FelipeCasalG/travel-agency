<?php

namespace App\Models;

use Database\Factories\CityFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name'];

    /**
     * Get the factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
     */
    public function newFactory(): Factory
    {
        return new CityFactory();
    }
}
