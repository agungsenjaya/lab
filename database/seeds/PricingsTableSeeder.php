<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class PricingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pricings')->insert([
            'user_id' => 1,
            'cabang_id' => 1,
            'status' => '0',
        ]);
        
        DB::table('pricings')->insert([
            'user_id' => 1,
            'cabang_id' => 2,
            'status' => '0',
        ]);
    }
}
