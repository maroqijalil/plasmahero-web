<?php

namespace Database\Seeders;

use App\Common\Models\Donor;
use Illuminate\Database\Seeder;

class DonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $donor = Donor::factory()
            ->count(25)
            ->create();
    }
}
