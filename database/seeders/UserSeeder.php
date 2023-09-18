<?php

namespace Database\Seeders;

use App\Enums\RoleName;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use App\Models\City;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createAdminUser();
        $this->createTeacherUser();
        $this->createStudentUser();
        $this->createParentUser();
    }

    public function createAdminUser()
    {
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('password'),
        ])->roles()->sync(Role::where('name', RoleName::ADMIN->value)->first());
    }

    public function createTeacherUser()
    {
        // $teacher=User::create([
        //     'name'     => 'Teacher User',
        //     'email'    => 'teacher@school.com',
        //     'password' => bcrypt('password'),
        // ])->roles()->sync(Role::where('name', RoleName::TEACHER->value)->first());

        // $teacher->school()->create([
        //     'city_id'=>City::where('name','karimnagar')->value('id'),
        //     'name'=>'scl 001',
        //     'address'=>'Address SJV14',
        // ]);

        $teacher = User::create([
            'name'     => 'teacher',
            'email'    => 'teacher@school.com',
            'password' => bcrypt('password'),
        ]);

        $teacher->roles()->sync(Role::where('name', RoleName::TEACHER->value)->first());

        // $teacher->school()->create([
        //     'city_id'  => City::where('name', 'karimnagar')->value('id'),
        //     'name'     => 'scl 001',
        //     'address'  => 'Address SJV14',
        // ]);

    }

    public function createStudentUser()
    {
        User::create([
            'name'     => 'Student',
            'email'    => 'student@student.com',
            'password' => bcrypt('password'),
        ])->roles()->sync(Role::where('name', RoleName::STUDENT->value)->first());
    }

    public function createParentUser()
    {
        User::create([
            'name'     => 'Parent',
            'email'    => 'parent@parent.com',
            'password' => bcrypt('password'),
        ])->roles()->sync(Role::where('name', RoleName::PARENT->value)->first());
    }
}
