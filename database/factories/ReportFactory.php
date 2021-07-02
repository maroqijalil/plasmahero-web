<?php

namespace Database\Factories;

use App\Common\Models\Donor;
use App\Common\Models\Pengguna;
use App\Common\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Common\Models\User;


class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->word(),
            'tgl' => $this->faker->date('Y-m-d', 'now'),
            'pesan' => $this->faker->sentence(),
            'foto' => Str::random(10),
            'id_pengguna' => Pengguna::where('status', 'a')->get()->random()->id,
            'id_donor' => Donor::get()->random()->id,

        ];
    }
}
