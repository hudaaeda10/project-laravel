<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // $this->call(JabatanSeeder::class);
        // factory(App\Jabatan::class, 5)->create();
        // $this->call(LevelUsersSeeder::class);
        // $this->call(MenuSeeder::class);
        // $this->call(MenuSeeder::class);
        // $this->call(UsersSeeder::class);
        $this->call(AksesSeeder::class);
    }
}
