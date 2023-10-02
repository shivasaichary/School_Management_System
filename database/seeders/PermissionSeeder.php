<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::findByName('Admin', 'web');
        $teacher = Role::findByName('Teacher', 'web');
        $student = Role::findByName('Student', 'web');
        $parent = Role::findByName('Parent', 'web');


        /* $adminPermissions = [
            [
                'name' => 'view_user',
                'guard' => 'web',
            ],
            [
                'name' => 'create_user',
                'guard' => 'web',
            ],
            [
                'name' => 'update_user',
                'guard' => 'web',
            ],
            [
                'name' => 'delete_user',
                'guard' => 'web',
            ]
        ]; */

        //ADMIN - PERMISSIONS: [CRUD - USERS]

        $permission = Permission::updateOrCreate(['name' => 'view_user', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'create_user', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'update_user', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'delete_user', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);


        // ADMIN - PERMISSIONS: [CRUD - SCHOOLS]

        $permission = Permission::updateOrCreate(['name' => 'view_school', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'create_school', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'update_school', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'delete_school', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);


        // ADMIN - PERMISSIONS: [CRUD - TEACHERS]

        $permission = Permission::updateOrCreate(['name' => 'view_teacher', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'create_teacher', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'update_teacher', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'delete_teacher', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);


        //ADMIN + TEACHER - PERMISSIONS: [CRUD - CLASSES]

        $permission = Permission::updateOrCreate(['name' => 'view_class', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);
        $teacher->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'create_class', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);
        $teacher->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'update_class', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);
        $teacher->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'delete_class', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);
        $teacher->givePermissionTo($permission);


        //TEACHER + ADMIN - PERMISSIONS: [CRUD - STUDENTS]

        $permission = Permission::updateOrCreate(['name' => 'view_student', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);
        $teacher->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'create_student', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);
        $teacher->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'update_student', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);
        $teacher->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'delete_student', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);
        $teacher->givePermissionTo($permission);


        //ADMIN + TEACHER + PARENT - PERMISSIONS: [CRUD - STUDENT RESULT]

        $permission = Permission::updateOrCreate(['name' => 'view_result', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);
        $teacher->givePermissionTo($permission);
        $parent->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'create_result', 'guard_name' => 'web']);
        $teacher->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'update_result', 'guard_name' => 'web']);
        $teacher->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'delete_result', 'guard_name' => 'web']);
        $teacher->givePermissionTo($permission);


        //ADMIN + TEACHER + PARENT - PERMISSIONS: [CRUD - STUDENT ATTENDANCE]

        $permission = Permission::updateOrCreate(['name' => 'view_attendance', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);
        $teacher->givePermissionTo($permission);
        $student->givePermissionTo($permission);
        $parent->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'create_attendance', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);
        $teacher->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'update_attendance', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);
        $teacher->givePermissionTo($permission);

        $permission = Permission::updateOrCreate(['name' => 'delete_attendance', 'guard_name' => 'web']);
        $admin->givePermissionTo($permission);
        $teacher->givePermissionTo($permission);
    }
}
