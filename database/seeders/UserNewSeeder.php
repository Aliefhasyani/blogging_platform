<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserNewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'usernew1',
                'password' => '12345678',
                'email' => 'usernew1@gmail.com',
                'role' => 'author'
            ],
            [
                'name' => 'usernew2',
                'password' => '12345678',
                'email' => 'usernew2@gmail.com',
                'role' => 'author'
            ],
            [
                'name' => 'usernew4',
                'password' => '12345678',
                'email' => 'usernew4@gmail.com',
                'role' => 'author'
            ],
            [
                'name' => 'usernew5',
                 'password' => '12345678',
                'email' => 'usernew5@gmail.com',
                'role' => 'author'
            ],
            [
                'name' => 'usernew6',
                 'password' => '12345678',
                'email' => 'usernew6@gmail.com',
                'role' => 'author'
            ],
        ];

        foreach($users as $user){
            User::create($user);
        };
    }
}
