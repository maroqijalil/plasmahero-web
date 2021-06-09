<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Pencocokan;
use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Factories\Factory;

class PencocokanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pencocokan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'id_admin' => Admin::factory(), 
            // 'id_pendonor' => Pengguna::factory(), 
            // 'id_penerima' => Pengguna::factory()
            'id_admin' => Admin::all()->random()->id,
            'id_pendonor' => Pengguna::all()->random()->id,
            'id_penerima' => Pengguna::all()->random()->id
        ];
    }
}
