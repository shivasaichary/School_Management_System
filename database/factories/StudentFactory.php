<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'id'=> 'TESI'.fake()->numberBetween(001,500),
            'name'  => fake()->words(3, true),
            'age' => rand(3, 17),
            'address' => fake()->address(15,true),
            'phone_number' => fake()->phoneNumber(12),
            'email'=>fake()->email(),
            'gender' =>fake()->randomElement(['Male','Female']),
            'student_code'=> 'TES-ID'. fake()->numberBetween(),
        ];
    }
}
