<?php

namespace Database\Seeders;

use App\Models\Airline;
use App\Models\City;
use Database\Factories\AirlineFactory;
use Database\Factories\CityFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = CityFactory::times(30)->create();

        AirlineFactory::times(5)
            ->create()
            ->each(function (Airline $airline) use ($cities) {
                $airline->cities()->attach($cities->random(3));
            });
    }
}
