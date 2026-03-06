<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Update data jika email sudah ada, jika belum buat baru
        User::updateOrCreate(
            ['email' => 'admin@perusahaan.com'], 
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => Hash::make('123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'it@perusahaan.com'], 
            [
                'name' => 'Tim IT Support',
                'username' => 'it',
                'password' => Hash::make('123'),
                'role' => 'it_support',
            ]
        );

        User::updateOrCreate(
            ['email' => 'hrd@perusahaan.com'],
            [
                'name' => 'Staff HRD',
                'username' => 'hrd',
                'password' => Hash::make('123'),
                'role' => 'hrd',
            ]
        );
    }   
}