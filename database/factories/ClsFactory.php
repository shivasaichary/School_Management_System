<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $classes = collect([
            'NURSERY',
            'LKG',
            'UKG',
            'FIRST',
            'SECOND',
            'THIRD',
            'FOURTH',
            'FIFTH',
            'SIXTH',
            'SEVENTH',
            'EIGHTH',
            'NINTH',
            'TENTH',
        ]);

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

        $starting_time = collect([

            '09:00:00',

            '11:00:00',

            '13:00:00',

            '15:00:00',

        ]);

        $ending_time = collect([

            '10:00:00',

            '12:00:00',

            '14:00:00',

            '16:00:00',

        ]);

        return [
            'name' => $classes->random(),
            'section' => fake()->randomElement(['A', 'B', 'C', 'D']),
            'subject' => $subjects->random(1),
            'starting_time' => $starting_time->random(),
            'ending_time' => $ending_time->random(),
        ];
    }
}
