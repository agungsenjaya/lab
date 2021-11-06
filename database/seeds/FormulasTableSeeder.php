<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FormulasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formulas')->insert([
            'judul' => 'sakit gigi',
            'kategori' => 1,
            'pembayaran' => '500.000',
        ]);
        DB::table('formulas')->insert([
            'judul' => 'sakit hati',
            'kategori' => 1,
            'pembayaran' => '700.000',
        ]);
        DB::table('formulas')->insert([
            'judul' => 'sakit kepala',
            'kategori' => 1,
            'pembayaran' => '250.000',
        ]);
        DB::table('formulas')->insert([
            'judul' => 'sakit jantung',
            'kategori' => 2,
            'pembayaran' => '5.000.000',
        ]);
        DB::table('formulas')->insert([
            'judul' => 'sakit koreng',
            'kategori' => 2,
            'pembayaran' => '150.000',
        ]);
    }
}
