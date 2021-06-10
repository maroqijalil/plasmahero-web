<?php

namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;


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
            'id_user' => User::where('role', 'pengguna')->get()->random()->id,
        ];
    }
}
