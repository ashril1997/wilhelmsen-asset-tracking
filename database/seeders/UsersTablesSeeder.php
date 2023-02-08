<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'              => 'john Smith',
            'email'             => 'john_smith@gmail.com',
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10)
        ]);
    }
}
