<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         User::create([
            'nama' => 'Administrator',
            'kontak' => '081234567890',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        User::create([
            'nama' => 'Member Satu',
            'kontak' => '081299887766',
            'username' => 'member',
            'password' => Hash::make('member123'),
            'role' => 'member'
        ]);
    }
}

