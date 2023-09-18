<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Hyderabad', 'Karimnagar', 'Warangal', 'Vijayawada', 'Kadapa','Ananthapur','Chittor','Vizag','Pulivendhula',
        ];

        foreach ($cities as $city) {
            City::create(['name' => $city]);
        }
    }
}
