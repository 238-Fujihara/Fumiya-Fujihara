<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BadbuttonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('badbuttons')->insert([
        'user_id'=>1,
        'edmondspost_id'=>1,
        'seattlepost_id'=>1,
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),    
        ]);
    }
}
