<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role_id'  => 1,
            'avatar' => null,
            'password' => Hash::make('admin')
        ]);
        User::create([
            'name' => 'Super',
            'email' => 'super@gmail.com',
            'role_id'  => 2,
            'avatar' => null,
            'password' => Hash::make('super')
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'role_id'  => 3,
            'avatar' => null,
            'password' => Hash::make('user')
        ]);
    }
}
