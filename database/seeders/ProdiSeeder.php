<?php

namespace Database\Seeders;

use App\Models\Prodi;
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
            'id_jurusan' => 1,
        ]);
        Prodi::create([
            'id' => 2,
            'nama' => 'S1 Terapan Teknologi Rekayasa Komputer',
            'id_jurusan' => 1,
        ]);
        Prodi::create([
            'id' => 3,
            'nama' => 'S1 Terapan dan Bisnis Digital',
            'id_jurusan' => 1,
        ]);

        // Jurusan Teknik Sipil
        Prodi::create([
            'id' => 4,
            'nama' => 'D3 Teknik Sipil',
            'id_jurusan' => 2,
        ]);
        Prodi::create([
            'id' => 5,
            'nama' => 'S1 Terapan Teknologi Rekayasa Konstruksi Jalan & Jembatan',
            'id_jurusan' => 2,
        ]);

        // Jurusan Teknik Mesin
        Prodi::create([
            'id' => 6,
            'nama' => 'S1 Terapan Teknologi Rekayasa Manufaktur',
            'id_jurusan' => 3,
        ]);
        Prodi::create([
            'id' => 7,
            'nama' => 'S1 Terapan Teknik Manufaktur Kapal',
            'id_jurusan' => 3,
        ]);

        // Jurusan Teknik Pertanian
        Prodi::create([
            'id' => 8,
            'nama' => 'S1 Terapan Agribisnis',
            'id_jurusan' => 4,
        ]);
        Prodi::create([
            'id' => 9,
            'nama' => 'S1 Terapan Teknologi Pengolahan Hasil Ternak',
            'id_jurusan' => 4,
        ]);

        // Jurusan Pariwisata
        Prodi::create([
            'id' => 10,
            'nama' => 'S1 Terapan Manajemen Bisnis Pariwisata',
            'id_jurusan' => 5,
        ]);
        Prodi::create([
            'id' => 11,
            'nama' => 'S1 Terapan Destinasi Pariwisata',
            'id_jurusan' => 5,
        ]);
    }
}
