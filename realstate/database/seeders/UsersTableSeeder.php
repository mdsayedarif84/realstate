<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admin
       DB::table('users')->insert([
        'name'=>'Admin',
        'username'=>'admin',
        'email'=>'admin84@gmail.com',
        'password'=>Hash::make('Abcd@123'),
        'role'=>'admin',
        'status'=>'active',
       ]);
       //user
       DB::table('users')->insert([
        'name'=>'User',
        'username'=>'user',
        'email'=>'user84@gmail.com',
        'password'=>Hash::make('Abcd@123'),
        'role'=>'user',
        'status'=>'active',
       ]);
       //user
       DB::table('users')->insert([
        'name'=>'Agent',
        'username'=>'agent',
        'email'=>'agent84@gmail.com',
        'password'=>Hash::make('Abcd@123'),
        'role'=>'agent',
        'status'=>'active',
       ]);
    }
}
