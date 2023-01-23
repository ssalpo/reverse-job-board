<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'user1@ya.ru',
                'password' => 'secret'
            ],
            [
                'email' => 'user2@ya.ru',
                'password' => 'secret'
            ],
            [
                'email' => 'user3@ya.ru',
                'password' => 'secret'
            ],
            [
                'email' => 'user4@ya.ru',
                'password' => 'secret'
            ],
        ];

        foreach ($users as $user) {
            User::create(array_merge($user , ['password' => Hash::make($user['password'])]));
        }
    }
}
