<?php

namespace Database\Seeders;

use App\Common\Models\Partisipan;
use App\Common\Models\Percakapan;
use App\Common\Models\Pesan;
use Illuminate\Database\Seeder;

class PesanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Percakapan::factory()
            ->count(5)
            ->create();
        Partisipan::factory()
            ->count(10)
            ->create();
        Pesan::factory()
            ->count(100)
            ->create();
    }
}
