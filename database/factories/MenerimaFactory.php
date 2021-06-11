<?php

namespace Database\Factories;

use App\Models\Menerima;
use App\Models\Notifikasi;
use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenerimaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Menerima::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_notifikasi' => Notifikasi::all()->random()->id,
            'id_user' => Pengguna::all()->random()->id
        ];
    }
}
