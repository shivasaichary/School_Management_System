<?php

namespace Database\Seeders;

use App\Enums\RoleName;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Role::updateOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        Role::updateOrCreate(['name' => 'Teacher', 'guard_name' => 'web']);
        Role::updateOrCreate(['name' => 'Student', 'guard_name' => 'web']);
        Role::updateOrCreate(['name' => 'Parent', 'guard_name' => 'web']);
    }
}
