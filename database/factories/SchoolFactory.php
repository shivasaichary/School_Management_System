<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cities = City::pluck('id');
        return [
            'city_id' => $cities->random(),
            'principal_name'    => fake()->name(),
            'school_name' => fake()->name(),
            'address' => fake()->address(),
            'school_code' => 'TES'.fake()->unique()->randomNumber(3),
            // $schoolCode = 'TES' . $faker->unique()->randomNumber(3);
        ];
    }
}
