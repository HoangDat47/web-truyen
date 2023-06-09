<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'admin','email'=>'admin@gmail.com','password'=>bcrypt('12345678'),'typeuser'=>'1'],
            ['name'=>'user','email'=>'user@gmail.com','password'=>bcrypt('12345678'),'typeuser'=>'2']
        ]);
    }
}
