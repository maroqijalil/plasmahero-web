<?php

namespace Database\Seeders;

use App\Models\Pencocokan;
use Illuminate\Database\Seeder;

class PencocokanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pencocokan = Pencocokan::factory()
            ->count(25)
            ->create();
    }
}
