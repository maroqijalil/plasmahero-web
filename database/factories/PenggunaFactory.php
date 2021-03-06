<?php

namespace Database\Factories;

use App\Common\Models\Pengguna;
use App\Common\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenggunaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pengguna::class;

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
            'kota' => $this->faker->address,
            'usia' => $this->faker->numberBetween(18, 50),
            'nama_tipe' => $this->faker->randomElement(['pendonor', 'penerima']),
            'jenis_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'gol_darah' => $this->faker->randomElement(['A', 'AB', 'B', 'O']),
            'rhesus' => $this->faker->randomElement(['+', '-']),
            'berat_badan' => $this->faker->numberBetween(40, 80),
            'tanggal_swab' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'status' => 'i',
        ];
    }
}
