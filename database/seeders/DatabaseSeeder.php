<?php

namespace Database\Seeders;

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
        // $this->call(UserSeeder::class);
        // $this->call(PencocokanSeeder::class);
        // $this->call(DonorSeeder::class);
        // $this->call(ReportSeeder::class);
        // $this->call(NotifikasiSeeder::class);
        // $this->call(MenerimaSeeder::class);
        $this->call(PesanSeeder::class);
    }
}
