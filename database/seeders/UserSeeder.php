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
        $user = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $admin = Role::findByName('Admin','web');
        $user->assignRole($admin);
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

        $user = User::create([
            'name'     => 'teacher',
            'email'    => 'teacher@school.com',
            'password' => bcrypt('password'),
        ]);

        $teacher = Role::findByName('Teacher','web');
        $user->assignRole($teacher);

        // $teacher->roles()->sync(Role::where('name', RoleName::TEACHER->value)->first());

        // $teacher->school()->create([
        //     'city_id'  => City::where('name', 'karimnagar')->value('id'),
        //     'name'     => 'scl 001',
        //     'address'  => 'Address SJV14',
        // ]);

    }

     public function createStudentUser()
    {
        $user = User::create([
            'name'     => 'Student',
            'email'    => 'student@student.com',
            'password' => bcrypt('password'),
        ]);

        $student = Role::findByName('Student','web');
        $user->assignRole($student);
    }

    public function createParentUser()
    {
        $user = User::create([
            'name'     => 'Parent',
            'email'    => 'parent@parent.com',
            'password' => bcrypt('password'),
        ]);

        $parent = Role::findByName('Parent','web');
        $user->assignRole($parent);
    }
}
