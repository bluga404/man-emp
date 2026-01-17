<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Pegawai::factory(25)->create();

        // $faker = Faker::create('id_ID');
        // for ($i = 0; $i < 26; $i++) {
        //     Pegawai::create([
        //         'nama_pegawai' => $faker->name(),
        //         'nik' => $faker->randomNumber(9),
        //         'alamat' => $faker->address(),
        //         'umur' => $faker->numberBetween($min=0, $max=100),
        //         'tempat_lahir' => $faker->city(),
        //         'tanggal_lahir' => $faker->date($format = 'Y-m-d'),
        //         'jenis_kelamin' => $faker->randomElement($array = array ('Laki-laki','Perempuan'))
        //     ]);
        // }

        // Pegawai::create([
        //     'nama_pegawai' => 'Walker',
        //     'nik' => '123456789',
        //     'alamat' => 'Parsuratan',
        //     'umur' => 22,
        //     'tempat_lahir' => 'Kabanjahe',
        //     'tanggal_lahir' => '2003-09-21',
        //     'jenis_kelamin' => 'Laki-laki'
        // ]);
    }
}
