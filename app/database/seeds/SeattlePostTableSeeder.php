<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeattlePostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seattlespost')->insert([
            'user_id'=>1,
            'title'=>"Edmonds",
            'date'=>"2023/03/18",
            'lat'=>1,
            'long'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),    
            ]);    
    }
}
