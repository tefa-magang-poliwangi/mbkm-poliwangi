<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'mahasiswa_id' => 34,
                'nilai' => 85,
                'keterangan' => 'Kerja bagus',
            ],
            [
                'mahasiswa_id' =>35,
                'nilai' => 78,
                'keterangan' => 'Perlu perbaikan',
            ],
            [
                'mahasiswa_id' => 36,
                'nilai' => 92,
                'keterangan' => 'Selalu tepat waktu',
            ],
            // Tambahkan data penilaian lainnya di sini
        ];

        // Masukkan data ke dalam tabel penilaian
        DB::table('penilaian')->insert($data);
    }
}
