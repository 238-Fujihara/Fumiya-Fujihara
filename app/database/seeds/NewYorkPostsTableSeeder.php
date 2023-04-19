<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NewYorkPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('new_york_posts')->insert([
            'user_id'=>1,
            'title'=>"Edmonds",
            'date'=>"2023/03/18",
            'lat'=>2,
            'long'=>2,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(), 
            ]);   
    
    }
}
