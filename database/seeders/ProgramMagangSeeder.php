<?php

namespace Database\Seeders;

use App\Models\ProgramMagang;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProgramMagangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProgramMagang::create([
            'kegiatan' => 'Magang Pemasaran',
            'waktu_mulai' => '2023-11-15',
            'waktu_akhir' => '2023-12-15',
            'posisi_mahasiswa' => 'Asisten Pemasaran',
            'validasi_kaprodi' => 'Belum Disetujui',
            'id_lowongan' => 1, // Ganti dengan ID Lowongan yang sesuai
            'id_pl_mitra' => 1, // Ganti dengan ID PL Mitra yang sesuai
        ]);

        // Data Program Magang kedua
        ProgramMagang::create([
            'kegiatan' => 'Magang IT Support',
            'waktu_mulai' => '2023-10-10',
            'waktu_akhir' => '2023-11-10',
            'posisi_mahasiswa' => 'IT Support Staff',
            'validasi_kaprodi' => 'Setuju',
            'id_lowongan' => 2, // Ganti dengan ID Lowongan yang sesuai
            'id_pl_mitra' => 1, // Ganti dengan ID PL Mitra yang sesuai
        ]);

        // Data Program Magang ketiga
        ProgramMagang::create([
            'kegiatan' => 'Magang Desain Grafis',
            'waktu_mulai' => '2023-09-05',
            'waktu_akhir' => '2023-10-05',
            'posisi_mahasiswa' => 'Desain Grafis Staff',
            'validasi_kaprodi' => 'Setuju',
            'id_lowongan' => 1, // Ganti dengan ID Lowongan yang sesuai
            'id_pl_mitra' => 1, // Ganti dengan ID PL Mitra yang sesuai
        ]);

        // Data Program Magang keempat
        ProgramMagang::create([
            'kegiatan' => 'Magang Akuntansi',
            'waktu_mulai' => '2023-08-01',
            'waktu_akhir' => '2023-09-01',
            'posisi_mahasiswa' => 'Asisten Akuntansi',
            'validasi_kaprodi' => 'Setuju',
            'id_lowongan' => 2, // Ganti dengan ID Lowongan yang sesuai
            'id_pl_mitra' => 1, // Ganti dengan ID PL Mitra yang sesuai
        ]);

        // Data Program Magang kelima
        ProgramMagang::create([
            'kegiatan' => 'Magang Riset',
            'waktu_mulai' => '2023-07-01',
            'waktu_akhir' => '2023-08-01',
            'posisi_mahasiswa' => 'Asisten Riset',
            'validasi_kaprodi' => 'Setuju',
            'id_lowongan' => 1, // Ganti dengan ID Lowongan yang sesuai
            'id_pl_mitra' => 1, // Ganti dengan ID PL Mitra yang sesuai
        ]);
    }
}
