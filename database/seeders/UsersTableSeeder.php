<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for cleaning earlier data to avoid duplicate entries
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@ph.id',
            'role' => 'admin',
            'password' => Hash::make('admin'),
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@ph.id',
            'role' => 'user',
            'password' => Hash::make('user'),
        ]);
        DB::table('users')->insert([
            'name' => 'XXXX',
            'email' => 'xx@ph.id',
            'role' => 'x',
            'password' => Hash::make('xx'),
        ]);
    }
}
