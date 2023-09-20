<?php

// namespace Database\Factories;

// use Illuminate\Database\Eloquent\Factories\Factory;
// use Faker\Generator as Faker;

// /**
//  * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
//  */
// class TeacherFactory extends Factory
// {
//     /**
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {

//         return [
//             'teacher_code'=>fake(),
//             'teacher_name' => fake()->words(5,true),
//             'email' => fake()->unique()->safeEmail,

//             'address' => fake()->word(15,true),
//             'phone_number' => fake()->phoneNumber(12),
//             'age' => rand(20,60),
//             'date_of_birth' => fake()->date,
//             'gender'=>fake()->randomElement(['MALE','FEMALE']),
//         ];
//     }
// }


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Teacher;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $subjects = collect([
            'TELUGU',
            'HINDI',
            'ENGLISH',
            'MATHS',
            'SCIENCE',
            'SOCIAL',
            'COMPUTERS',
            'GAMES',
            'YOGA',
        ]);

        return [
            'teacher_code' => 'TET-ID'. $this->faker->unique()->randomNumber(3),
            'teacher_name' => $this->faker->words(2, true),
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->word(),
            'phone_number' => $this->faker->phoneNumber,
            'subject'=>$subjects->random(1),
            'age' => $this->faker->numberBetween(20, 60),
            'date_of_birth' => $this->faker->date,
            'gender' => $this->faker->randomElement(['MALE','FEMALE']),
        ];
    }
}
