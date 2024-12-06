<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guardName = 'api';

        $data = [
            [
                'name' => 'role-view',
                'guard_name' => $guardName,
            ],
            [
                'name' => 'role-store',
                'guard_name' => $guardName,
            ],
            [
                'name' => 'role-edit',
                'guard_name' => $guardName,
            ],
            [
                'name' => 'role-delete',
                'guard_name' => $guardName,
            ],
            [
                'name' => 'permission-view',
                'guard_name' => $guardName,
            ],
            [
                'name' => 'permission-store',
                'guard_name' => $guardName,
            ],
            [
                'name' => 'permission-edit',
                'guard_name' => $guardName,
            ],
            [
                'name' => 'permission-delete',
                'guard_name' => $guardName,
            ],
        ];

        Permission::insert($data);
    }
}
