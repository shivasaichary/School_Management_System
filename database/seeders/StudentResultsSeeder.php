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
            $studentName = 'student';
            $subjectcode = 'TESUB-ID :'. $faker->numberBetween(1, 10);
            $subjectName = collect([
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

            $marksObtained = $faker->numberBetween(90, 100);
            $dateOfExam = $faker->dateTimeBetween('-1 year', 'now');

            DB::table('results')->insert([
                'student_code' =>$studentId,
                'student_name' => $studentName,
                'subject_code' =>$subjectcode,
                'subject_name' => $subjectName->random(1),
                'marks_obtained' => $marksObtained,
                'date_of_exam' => $dateOfExam,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('results')->orderBy('marks_obtained', 'desc')->get();

    }
}
