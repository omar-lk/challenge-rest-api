<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::insert([
            [
                'name' => 'omar',
                'email' => 'omar' . '@gmail.com',
                'type' => 'teacher',
                'password' => Hash::make('password')
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'type' => 'student',
                'password' => Hash::make('password')
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'type' => 'student',
                'password' => Hash::make('password')
            ]
        ]);
    }
}
