<?php

namespace Database\Seeders;

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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123123123'),
        ]);

        DB::table('users')->insert([
            'name' => 'phat',
            'email' => 'phat@gmail.com',
            'role' => 'user',
            'password' => bcrypt('123123123'),
        ]);

        DB::table('users')->insert([
            'name' => 'phatntt',
            'email' => 'phatne@gmail.com',
            'role' => 'user',
            'password' => bcrypt('123123123'),
        ]);
    }
}
