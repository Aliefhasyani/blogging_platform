<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddMoreUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $users = [
                [
                'name' => 'User 4',
                'password' => '12345678',
                'email' => 'user4@gmail.com',
                'role' => 'author'
            ],
            [
                'name' => 'User 5',
                'password' => '12345678',
                'email' => 'user5@gmail.com',
                'role' => 'author'
            ],
            [
                'name' => 'User 6',
                'password' => '12345678',
                'email' => 'user7@gmail.com',
                'role' => 'author'
            ]
        ];

        foreach($users as $value){
            User::create($value);
        }
    }
}
