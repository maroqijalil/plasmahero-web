<?php

namespace Database\Factories;

use App\Common\Models\Donor;
use App\Common\Models\Pengguna;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Donor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'id_pendonor' => Pengguna::factory(), 
            // 'id_penerima' => Pengguna::factory(),
            'id_pendonor' => Pengguna::all()->random()->id,
            'id_penerima' => Pengguna::all()->random()->id,
            'tipe' => $this->faker->randomElement(['darah merah', 'darah putih', 'plasma']),
            'tanggal' => $this->faker->date('Y-m-d', 'now'),
            'waktu' => $this->faker->time('H:i:s', 'now'),
            'nama_udd' => $this->faker->randomElement(['PMI', 'puskemas', 'RS']),
            'alamat' => $this->faker->address,
            'kelurahan' => $this->faker->address,
            'kecamatan' => $this->faker->address,
            'kota' => $this->faker->address,
            'judul' => $this->faker->word(),
            'isi' => $this->faker->sentence()
        ];
    }
}