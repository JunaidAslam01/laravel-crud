<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'password' => bcrypt('password'),
                'email' => 'admin@example.com',
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                'name' => 'user',
                'password' => bcrypt('password'),
                'email' => 'user1@example.com',
                'role' => 'user',
                'status' => 'active',
            ],
            [
                'name' => 'user',
                'password' => bcrypt('password'),
                'email' => 'user2@example.com',
                'role' => 'user',
                'status' => 'inactive',
            ],
        ]);
    }
}
