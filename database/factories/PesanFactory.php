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
        return [
            'id_partisipan' => Partisipan::all()->random()->id,
            'id_pengirim' => User::all()->random()->id,
            'isi' => $this->faker->sentence()
        ];
    }
}