<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'name' => 'Paulo Cesar Casillas Martinez',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456789'),
                'email_verified_at' => now()
            ]
        ];

        foreach ($users as $user) {
            # code...
            User::create($user);
        }
    }
}
