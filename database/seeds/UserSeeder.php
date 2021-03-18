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
            'name' => 'Admin Ichsan Arrizqi',
            'email' => 'ichsanarrizqi090@gmail.com',
            'username' => 'IchsanArrizqi',
            'role' => 'admin',
            'pangkat_id' => 1,
            'nrp' => '11806634',
            'password' => bcrypt('password')
        ]);
    }
}
