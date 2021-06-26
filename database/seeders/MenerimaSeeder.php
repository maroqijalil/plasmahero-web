<?php

namespace Database\Seeders;

use App\Common\Models\Menerima;
use Illuminate\Database\Seeder;

class MenerimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menerima::factory()
        ->count(30)
        ->create();
    }
}
