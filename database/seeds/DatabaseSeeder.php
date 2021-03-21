<?php

use Illuminate\Database\Seeder;
use App\Detailkpr;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 17398; $i++){
            Detailkpr::where('tmt_angsuran','0000-00-00')->update([
                'tmt_angsuran' => Carbon::now()
            ]);
        }
        // $this->call(PangkatSeeder::class);
        // $this->call(UserSeeder::class);
    }
}
