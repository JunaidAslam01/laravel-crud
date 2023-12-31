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
            ],
            [
                'name' => 'user1',
                'password' => bcrypt('password'),
                'email' => 'user1@example.com',
                'role' => 'user',
            ],
            [
                'name' => 'user2',
                'password' => bcrypt('password'),
                'email' => 'user2@example.com',
                'role' => 'user',
            ],
        ]);
    }
}
