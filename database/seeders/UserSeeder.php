<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table('users')->insert([
            'email' => $faker->safeEmail,
            'password' => Hash::make(Str::random(8)),
            'role' => $faker->randomElement(['admin', 'user']),
            'name' => $faker->name,
        ]);
    }
}
