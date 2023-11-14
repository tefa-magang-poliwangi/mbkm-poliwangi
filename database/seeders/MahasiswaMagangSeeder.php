<?php

namespace Database\Seeders;

use App\Models\MahasiswaMagang;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaMagangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MahasiswaMagang::create([
            'periode_aktif' => '2023-2024',
            'id_mahasiswa' => 34, // Ganti dengan ID Mahasiswa yang sesuai
        ]);

        // Mahasiswa kedua
        MahasiswaMagang::create([
            'periode_aktif' => '2023-2024',
            'id_mahasiswa' => 35, // Ganti dengan ID Mahasiswa yang sesuai
        ]);

        // Mahasiswa ketiga
        MahasiswaMagang::create([
            'periode_aktif' => '2023-2024',
            'id_mahasiswa' => 36, // Ganti dengan ID Mahasiswa yang sesuai
        ]);

        // Mahasiswa keempat
        MahasiswaMagang::create([
            'periode_aktif' => '2023-2024',
            'id_mahasiswa' => 37, // Ganti dengan ID Mahasiswa yang sesuai
        ]);

        // Mahasiswa kelima
        MahasiswaMagang::create([
            'periode_aktif' => '2023-2024',
            'id_mahasiswa' => 38, // Ganti dengan ID Mahasiswa yang sesuai
        ]);
    }
}
