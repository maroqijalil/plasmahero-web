<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'id_user' => User::factory(),
            'no_hp' => $this->faker->phoneNumber,
            'alamat' => $this->faker->address,
            'kelurahan' => $this->faker->address,
            'kecamatan' => $this->faker->address,
            'kota' => $this->faker->address
        ];
    }
}