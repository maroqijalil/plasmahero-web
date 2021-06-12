<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Report;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(20)
            ->hasPengguna()
            ->state(['role' => 'pengguna'])
            ->create();
        User::factory()
            ->count(1)
            ->hasAdmin()
            ->state(['role' => 'admin'])
            ->create();
    }
}
