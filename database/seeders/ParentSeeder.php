<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $numRecords = 10; // Adjust the number of records you want to insert

        foreach (range(1, $numRecords) as $index) {
            DB::table('parents')->insert([
                'parent_name' =>'parent',
                'age' => $faker->numberBetween(30, 60),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'phone_number' => $faker->phoneNumber,
                'email' => 'parent@parent.com',
                'address' => $faker->address,
                'user_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
