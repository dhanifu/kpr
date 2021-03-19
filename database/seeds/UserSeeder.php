<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Rizal',
            'email' => 'rizalihwan90@gmail.com',
            'username' => 'admin',
            'role' => '0',
            'password' => bcrypt('password')
        ]);
    }
}
