<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->createAdmin();
        $this->call(UserSeeder::class);
        $this->call(PencocokanSeeder::class);
        $this->call(DonorSeeder::class);
        $this->call(ReportSeeder::class);
        $this->call(NotifikasiSeeder::class);
        $this->call(MenerimaSeeder::class);
        $this->call(PesanSeeder::class);
    }

    /**
     * create an account
     * email    :plasmahero-admin-email.@gmail.com
     * password :plasmahero-admin-password-is-so-long
     * @return void
     */
    public function createAdmin() {
        \App\Common\Models\User::newFactory()
                    ->hasAdmin()
                    ->state([
                        'email' => 'plasmahero-admin-email.@gmail.com',
                        'role' => 'admin',
                        'password' => bcrypt('plasmahero-admin-password-is-so-long'), // password
                        'remember_token' => Str::random(10)
                    ])
                    ->create();
    }
}
