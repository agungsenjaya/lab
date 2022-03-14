<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CabangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cabangs')->insert([
            'name' => 'Klinik Permata',
            'kota' => 'KOTA SUKABUMI',
            'alamat' => 'jl raya soekabumi 11',
        ]);
        DB::table('cabangs')->insert([
            'name' => 'Klinik Farma',
            'kota' => 'KABUPATEN SUKABUMI',
            'alamat' => 'jl raya soekabumi 12',
        ]);
    }
}
