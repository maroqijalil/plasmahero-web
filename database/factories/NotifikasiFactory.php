<?php

namespace Database\Factories;

use App\Models\Notifikasi;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotifikasiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Notifikasi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'id_admin' => Admin::all()->random()->id,
            // 'judul' => $arrayJudul($index),
            // 'keterangan' => $arrayKeterangan($index),
            'tanggal' => $this->faker->date('Y-m-d', 'now'),
            'waktu' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}