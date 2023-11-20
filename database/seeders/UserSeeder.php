<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'username' => 'emon',
                'email' => 'emon@mail.com',
                'password' => Hash::make('emon'),
                'first_name' => 'Emon',
                'last_name' => 'Ahmed',
                'bio' => 'A learner',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'username' => 'alnahian',
                'email' => 'alnahian@mail.com',
                'password' => Hash::make('alnahian'),
                'first_name' => 'Al',
                'last_name' => 'Nahian',
                'bio' => 'Dev+Designer, Indie Hacker, and Code Whisperer.',
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'username' => 'me_shaon',
                'email' => 'shaon@mail.com',
                'password' => Hash::make('me_shaon'),
                'first_name' => 'Ahmed Shamim',
                'last_name' => 'Hasan',
                'bio' => 'Software engineer, Problem solver, Learning enthusiast, Family guy!',
                'created_at' => now(),
            ]
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
