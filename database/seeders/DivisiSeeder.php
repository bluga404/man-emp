<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Divisi;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisi = ['Human Relationship', 'Information Technology', 'Resource Planning', 'Field', 'Canteen', 'Production', 'Maintenance'];

        foreach ($divisi as $item) {
            Divisi::create([
                'nama_divisi' => $item,
            ]);
        }
    }
}
