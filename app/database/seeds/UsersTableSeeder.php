<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_id'=>1,
            'post_id'=>1,
            'text'=>"サンプル３",
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),    
        ]);
    }
}
