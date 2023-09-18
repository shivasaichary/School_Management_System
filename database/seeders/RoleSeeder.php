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
    public function run(): void
    {
        $this->createAdminRole();
        $this->createTeacherRole();
        $this->createStudentRole();
        $this->createParentRole();
    }

    protected function createRole(RoleName $role, Collection $permissions): void
    {
        $newRole = Role::create(['name' => $role->value]);
        $newRole->permissions()->sync($permissions);
    }

    protected function createAdminRole(): void
    {
        $permissions = Permission::query()
            ->where('name', 'like', 'user.%')
            ->orWhere('name','like','schools.%')
            ->pluck('id');

        $this->createRole(RoleName::ADMIN, $permissions);
    }

    protected function createTeacherRole(): void
    {
        $permissions = Permission::query()
            ->where('name', 'like', 'teacher.%')
            ->pluck('id');

        $this->createRole(RoleName::TEACHER, $permissions);  //$permissions collect()
    }

    protected function createStudentRole(): void
    {
        $permissions = Permission::query()
            ->where('name', 'like', 'student.%')
            ->pluck('id');

        $this->createRole(RoleName::STUDENT, $permissions);
    }

    protected function createParentRole(): void
    {
        $permissions = Permission::query()
            ->where('name', 'like', 'parent.%')
            ->pluck('id');

        $this->createRole(RoleName::PARENT, $permissions);
    }
}
