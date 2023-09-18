<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Cls;
use App\Models\Student;
use App\Models\School;
use App\Models\User;
use App\Models\Teacher;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CitySeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            TeacherSeeder::class,
        ]);

        $this->seedDemoSchools();
    }

    public function seedDemoSchools()
    {
        $students   = Student::factory(7);
        $classes = Cls::factory(13)->has($students);
        $school = School::factory()->has($classes);

        Teacher::factory(20)->create();

        User::factory(18)->teacher()->has($school)->create();

        // You can add additional seeders or customization here if needed
    }
}
