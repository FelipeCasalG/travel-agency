<?php

namespace Database\Seeders;

use App\Models\City;
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
        CityFactory::new()->count(35)->create();
    }
}
