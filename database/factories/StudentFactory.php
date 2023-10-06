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
            'student_name'  => 'student',
            'age' => rand(3, 17),
            'address' => fake()->address(15,true),
            'phone_number' => fake()->phoneNumber(12),
            'email'=>'student@student.com',
            'gender' =>fake()->randomElement(['Male','Female']),
            'student_code'=> 'TES-ID'.rand(10,700),
            'stripe_customer_id'=>null,
            'user_id'=>3,
        ];
    }
}
