<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $guardName = 'api';

        $data = [
            [
                'name' => 'admin',
                'guard_name' => $guardName,
            ],
            [
                'name' => 'author',
                'guard_name' => $guardName,
            ],
            [
                'name' => 'editor',
                'guard_name' => $guardName,
            ],
        ];

        Role::insert($data);
    }
}
