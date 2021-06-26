<?php

namespace Database\Factories;

use App\Common\Models\Admin;
use App\Common\Models\Partisipan;
use App\Common\Models\Percakapan;
use App\Common\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartisipanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partisipan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_percakapan' => Percakapan::all()->random()->id,
            'id_admin' => Admin::all()->random()->id,
            'id_user' => User::all()->random()->id,
            'tipe_partisipan' => $this->faker->randomElement(['pendonor', 'penerima'])
        ];
    }
}