<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\StudentTimetable;
use Faker\Generator as Faker;

class StudentTimetableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StudentTimetable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Factory::create();

        return [
            'student_code' =>'TES-ID'. $faker->numberBetween(1, 200),
            'day_of_week' => $faker->randomElement(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']),
            'start_time' => $faker->time('H:i'),
            'end_time' => $faker->time('H:i'),
            'subject_name' => $faker->sentence(3),
            'instructor' => $faker->name,
            'classroom' => $faker->word,
        ];
    }
}
