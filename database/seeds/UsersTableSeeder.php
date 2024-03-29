<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * ROLE SEEDER
         */
        $ownerRole = new Role();
        $ownerRole->name = 'owner';
        $ownerRole->display_name = 'Owner';
        $ownerRole->save();
        
        $superRole = new Role();
        $superRole->name = 'superadmin';
        $superRole->display_name = 'Superadmin';
        $superRole->save();
        
        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->display_name = 'Admin';
        $adminRole->save();
        /**
         * ADMIN DATA
         */
        $a = new User();
        $a->name = 'owner';
        $a->username = 'owner123';
        $a->email = 'owner@sample.com';
        $a->password = Hash::make('owner123');
        $a->save();
        $a->attachRole($ownerRole);
        
        // $b = new User();
        // $b->name = 'superadmin';
        // $b->user_id = 1;
        // $b->cabang_id = 1;
        // $b->email = 'super@sample.com';
        // $b->password = Hash::make('super123');
        // $b->save();
        // $b->attachRole($superRole);
        
        // $c = new User();
        // $c->name = 'admin';
        // $c->user_id = 2;
        // $c->cabang_id = 1;
        // $c->email = 'admin@sample.com';
        // $c->password = Hash::make('admin123');
        // $c->save();
        // $c->attachRole($adminRole);
    }
}
