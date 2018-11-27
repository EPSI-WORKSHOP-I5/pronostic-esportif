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
        DB::table('roles')->insert([
            [
                'name' => 'Administrateur',
            ],
            [
                'name' => 'Utilisateur',
            ],
        ]);

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'role_id' => 1,
                'email' => 'pouletfurtif@hotmail.fr',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'User',
                'role_id' => 2,
                'email' => 'levesque.flavien@outlook.fr',
                'password' => bcrypt('user'),
            ],
        ]);
    }
}
