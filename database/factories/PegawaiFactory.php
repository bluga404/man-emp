<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'nama_pegawai' => $this->faker->name(),
                'email' => $this->faker->email(),
                'nik' => $this->faker->randomNumber(9),
                'alamat' => $this->faker->address(),
                'umur' => $this->faker->numberBetween($min=0, $max=100),
                'tempat_lahir' => $this->faker->city(),
                'tanggal_lahir' => $this->faker->date($format = 'Y-m-d'),
                'jenis_kelamin' => $this->faker->randomElement($array = array ('Laki-laki','Perempuan'))
        ];
    }
}
