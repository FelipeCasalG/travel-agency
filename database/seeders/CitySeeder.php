<?php

namespace Database\Seeders;

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

        $airlines = AirlineFactory::times(5)->create();

        foreach ($cities as $city) {
            $randomAirlines = $airlines->random(rand(1, 3))->pluck('id');
            $city->airlines()->attach($randomAirlines);
        }
    }
}
