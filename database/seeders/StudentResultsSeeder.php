<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentResultsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Loop to generate multiple fake results
        for ($i = 0; $i < 60; $i++) {
            $studentId = 'TES-ID :'. $faker->numberBetween(1, 100);
            $studentName = $faker->name;
            $subjectId = 'TESUB-ID :'. $faker->numberBetween(1, 10);
            $subjectName = $faker->word;
            $marksObtained = $faker->numberBetween(0, 100);
            $dateOfExam = $faker->dateTimeBetween('-1 year', 'now');

            DB::table('results')->insert([
                'student_code' =>$studentId,
                'student_name' => $studentName,
                'subject_id' =>$subjectId,
                'subject_name' => $subjectName,
                'marks_obtained' => $marksObtained,
                'date_of_exam' => $dateOfExam,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('results')->orderBy('marks_obtained', 'desc')->get();

    }
}
