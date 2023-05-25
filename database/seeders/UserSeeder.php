<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'id' => 0,
                'name' => 'Admin',
                'email' => '',
                'password' => '',
                'email_verified_at' => now(),
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}