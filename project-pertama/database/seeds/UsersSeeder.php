<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'aeda',
                'username' => 'aeda',
                'level_user_id' => 1,
                'email' => 'aeda@gmail.com',
                'password' => bcrypt('123456'),
                'remember_token' => Str::random(40),
            ],
            [
                'name' => 'kana',
                'username' => 'kana',
                'level_user_id' => 2,
                'email' => 'kana@gmail.com',
                'password' => bcrypt('123456'),
                'remember_token' => Str::random(40),
            ]
        ]);
    }
}
