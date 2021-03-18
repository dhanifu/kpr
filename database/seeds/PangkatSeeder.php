<?php

use App\Pangkat;
use Illuminate\Database\Seeder;

class PangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pangkat::create([
            'pangkat' => 'kopda',
            'corps' => 'none',
            'kesatuan' => 'YONIF 712/REM 131',
            'tahap' => 2
        ]);
    }
}
