<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $numRecords = 50;

        for ($i = 0; $i < $numRecords; $i++) {
            DB::table('attendances')->insert([
                'student_code' => 'TES-ID' . $i,
                'student_name'=>'student',
                'date' => $faker->date,
                'status' => $faker->randomElement(['present', 'absent', 'late']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
