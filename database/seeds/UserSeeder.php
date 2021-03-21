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
            'name' => 'Admin Rizal Gans',
            'email' => 'rizalihwan94@gmail.com',
            'nrp' => 11806858,
            'role' => '0',
            'status_verif' => 1,
            'password' => bcrypt('password')
        ]);
    }
}
