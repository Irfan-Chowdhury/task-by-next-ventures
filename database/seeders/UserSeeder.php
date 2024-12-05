<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name'=>'Mr Admin',
                'username'=> 'admin',
                'phone'=> 1234567890,
                'address'=> "Hathazari, Chittagong, Bangladesh",
                'email'=> 'admin@gmail.com',
                'password'=> bcrypt('admin123'),
                'is_active'=> true,
            ],
            [
                'name'=>'Mr User',
                'username'=> 'user',
                'phone'=> 234423242,
                'address'=> "Uttora, Dhaka, Bangladesh",
                'email'=> 'user@gmail.com',
                'password'=> bcrypt('user123'),
                'is_active'=> true,
            ]
        ];

        User::insert($data);
    }
}
