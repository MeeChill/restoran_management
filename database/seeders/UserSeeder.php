<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Buat akun admin
        User::create([
            'username' => 'admin',
            'password' => Hash::make('adminpassword'), // Ganti dengan password yang diinginkan
            'role' => 'admin',
        ]);

        // Buat akun staff
        User::create([
            'username' => 'staff',
            'password' => Hash::make('staffpassword'), // Ganti dengan password yang diinginkan
            'role' => 'staff',
        ]);
    }
}
