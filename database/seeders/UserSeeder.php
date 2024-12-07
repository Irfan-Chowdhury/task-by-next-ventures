<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name'=>'Mr Admin',
            'username'=> 'admin',
            'phone'=> 1234567890,
            'address'=> "Hathazari, Chittagong, Bangladesh",
            'email'=> 'admin@gmail.com',
            'password'=> bcrypt('admin123'),
            'is_active'=> true,
        ]);

        $role = Role::findByName('admin', 'api');
        $user->syncRoles($role);

        $permissions = Permission::get()->pluck('name');
        $role->syncPermissions($permissions);

    }
}
