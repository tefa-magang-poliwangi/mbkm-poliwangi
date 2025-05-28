<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jurusan::firstOrCreate([
            'id' => 1,
            'nama_jurusan' => 'Teknologi Rekayasa Perangkat Lunak',
        ]);

        Jurusan::firstOrCreate([
            'id' => 2,
            'nama_jurusan' => 'Teknologi Rekayasa Komputer',
        ]);

        Jurusan::firstOrCreate([
            'id' => 3,
            'nama_jurusan' => 'Bisnis Digital',
        ]);

        Jurusan::firstOrCreate([
            'id' => 4,
            'nama_jurusan' => 'Teknologi Rekayasa Manufaktur',
        ]);

        Jurusan::firstOrCreate([
            'id' => 5,
            'nama_jurusan' => 'Teknik Manufaktur Kapal',
        ]);
        Jurusan::firstOrCreate([
            'id' => 6,
            'nama_jurusan' => 'Teknologi Rekayasa Konstruksi Jalan & Jembatan',
        ]);
        Jurusan::firstOrCreate([
            'id' => 7,
            'nama_jurusan' => 'Teknologi Pengolahan Hasil Ternak',
        ]);
        Jurusan::firstOrCreate([
            'id' => 8,
            'nama_jurusan' => 'Agribisnis',
        ]);
        Jurusan::firstOrCreate([
            'id' => 9,
            'nama_jurusan' => 'Teknik Sipil',
        ]);
        Jurusan::firstOrCreate([
            'id' => 10,
            'nama_jurusan' => 'Manajemen Bisnis Pariwisata',
        ]);
        Jurusan::firstOrCreate([
            'id' => 11,
            'nama_jurusan' => 'Destinasi Pariwisata',
        ]);
    }
}
