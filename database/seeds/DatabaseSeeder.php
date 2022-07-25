<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // $this->call(DoktersTableSeeder::class);
        // $this->call(PricingsTableSeeder::class);
        // $this->call(CabangsTableSeeder::class);
    }
}
