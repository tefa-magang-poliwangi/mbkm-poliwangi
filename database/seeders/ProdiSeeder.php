<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Jurusan Bisnis dan Informatika
        Prodi::create([
            'id' => 1,
            'nama' => 'S1 Terapan Teknologi Rekayasa Perangkat Lunak',
        ]);
        Prodi::create([
            'id' => 2,
            'nama' => 'S1 Terapan dan Bisnis Digital',
        ]);
        Prodi::create([
            'id' => 3,
            'nama' => 'S1 Terapan Teknologi Rekayasa Komputer',
        ]);

        // Jurusan Teknik Sipil
        Prodi::create([
            'id' => 4,
            'nama' => 'D3 Teknik Sipil',
        ]);
        Prodi::create([
            'id' => 5,
            'nama' => 'S1 Terapan Teknologi Rekayasa Konstruksi Jalan & Jembatan',
        ]);

        // Jurusan Teknik Mesin
        Prodi::create([
            'id' => 6,
            'nama' => 'S1 Terapan Teknologi Rekayasa Manufaktur',
        ]);
        Prodi::create([
            'id' => 7,
            'nama' => 'S1 Terapan Teknik Manufaktur Kapal',
        ]);

        // Jurusan Teknik Pertanian
        Prodi::create([
            'id' => 8,
            'nama' => 'S1 Terapan Agribisnis',
        ]);
        Prodi::create([
            'id' => 9,
            'nama' => 'S1 Terapan Teknologi Pengolahan Hasil Ternak',
        ]);

        // Jurusan Pariwisata
        Prodi::create([
            'id' => 10,
            'nama' => 'S1 Terapan Manajemen Bisnis Pariwisata',
        ]);
        Prodi::create([
            'id' => 11,
            'nama' => 'S1 Terapan Destinasi Pariwisata',
        ]);
    }
}
