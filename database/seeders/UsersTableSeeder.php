<?php

namespace Database\Seeders;

use App\Models\User;
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
            ['id' => 1, 'email' => 'osman@hotmail.com', 'password' => Hash::make('12345678')],
            ['id' => 2, 'email' => 'moharram82@hotmail.com', 'password' => Hash::make('12345678')],
            ['id' => 3, 'email' => 'bakri@hotmail.com', 'password' => Hash::make('12345678')],
            ['id' => 4, 'email' => 'omer@hotmail.com', 'password' => Hash::make('12345678')],
            ['id' => 5, 'email' => 'ali@hotmail.com', 'password' => Hash::make('12345678')],
            ['id' => 6, 'email' => 'rami@hotmail.com', 'password' => Hash::make('12345678')],
        ];

        foreach ($users as $user) {
            $r = User::create($user);
        }

        //\App\Models\User::factory(10)->create();
    }
}
