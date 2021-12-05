<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DoktersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dokters')->insert([
            'name' => 'boyke',
            'cabang_id' => 1,
            'specialist' => 'umum',
            'user_id' => 2,
        ]);
        DB::table('dokters')->insert([
            'name' => 'elman',
            'cabang_id' => 1,
            'specialist' => 'gigi',
            'user_id' => 2,
        ]);
        DB::table('dokters')->insert([
            'name' => 'sarah',
            'cabang_id' => 1,
            'specialist' => 'jantung',
            'user_id' => 2,
        ]);
    }
}
