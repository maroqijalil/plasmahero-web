<?php

namespace Database\Factories;

use App\Common\Models\Partisipan;
use App\Common\Models\Pesan;
use App\Common\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PesanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pesan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $partisipan = Partisipan::all()->random();
        return [
            'id_partisipan' => $partisipan->id,
            'id_pengirim' => $this->faker->randomElement([$partisipan->id_admin, $partisipan->id_pendonor, $partisipan->id_penerima]),
            'isi' => $this->faker->sentence()
        ];
    }
}