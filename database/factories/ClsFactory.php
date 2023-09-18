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
        return [
            'name'=>$classes->random(),
            'section'=>fake()->randomElement(['A','B','C','D']),
            'subject'=>$subjects->random(6),
        ];
    }
}
