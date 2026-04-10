<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // =========================
        // ALL PERMISSIONS
        // =========================
        $permissions = [

            // student
            'student.view',
            'student.create',
            'student.edit',
            'student.delete',

            'staff.view',
            'staff.create',
            'staff.edit',
            'staff.delete',

            'class.view',
            'class.create',
            'class.edit',
            'class.delete',

            'section.view',
            'section.create',
            'section.edit',
            'section.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // =========================
        // ROLES
        // =========================
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $staffRole = Role::firstOrCreate(['name' => 'staff']);

        // =========================
        // ASSIGN PERMISSIONS
        // =========================
        $adminRole->syncPermissions($permissions); 

        $staffRole->syncPermissions([
            'student.view',
            'staff.view',
            'class.view',
            'section.view'
        ]); 

        // =========================
        // USER CREATE
        // =========================
        $user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('123456'),
            ]
        );

        $user->assignRole('admin');
    }
}
