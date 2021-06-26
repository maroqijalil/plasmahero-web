<?php

namespace Database\Seeders;

use App\Common\Models\Report;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $report = Report::factory()
            ->count(15)
            ->create();
    }
}
