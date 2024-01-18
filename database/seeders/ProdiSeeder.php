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
        // Data Seeder Prodi Baru
        Prodi::create([
            'id' => 1,
            'nama' => 'Agribisnis',
            'kode_prodi' => '41311',
            'jenjang_pendidikan' => 'D4',
            'id_prodi_feeder' => 'c5de86f9-c6b4-4740-961b-32da3b1c003a',
            'id_jurusan' => 4,
        ]);
        Prodi::create([
            'id' => 2,
            'nama' => 'Teknik Informatika',
            'kode_prodi' => '55401',
            'jenjang_pendidikan' => 'D3',
            'id_prodi_feeder' => '7831ea95-1f70-4335-93c8-a81f14745b2c',
            'id_jurusan' => 1,
        ]);
        Prodi::create([
            'id' => 3,
            'nama' => 'Teknik Sipil',
            'kode_prodi' => '22401',
            'jenjang_pendidikan' => 'D3',
            'id_prodi_feeder' => 'ed4513bd-e325-472f-b7f7-5fb1c5d031b0',
            'id_jurusan' => 2,
        ]);
        Prodi::create([
            'id' => 4,
            'nama' => 'Teknologi Rekayasa Perangkat Lunak',
            'kode_prodi' => '58302',
            'jenjang_pendidikan' => 'D4',
            'id_prodi_feeder' => 'bbe32aca-5907-4f3a-8ff1-3f427abf62d1',
            'id_jurusan' => 1,
        ]);
        Prodi::create([
            'id' => 5,
            'nama' => 'Teknologi Rekayasa Manufaktur',
            'kode_prodi' => '36301',
            'jenjang_pendidikan' => 'D4',
            'id_prodi_feeder' => 'cc0a4142-4f92-4b2e-ab21-5b77e566efbe',
            'id_jurusan' => 3,
        ]);
        Prodi::create([
            'id' => 6,
            'nama' => 'Teknologi Rekayasa Komputer',
            'kode_prodi' => '56301',
            'jenjang_pendidikan' => 'D4',
            'id_prodi_feeder' => 'e4f86d0e-d560-488f-91b1-58256c4345c5',
            'id_jurusan' => 1,
        ]);
        Prodi::create([
            'id' => 7,
            'nama' => 'Manajemen Bisnis Pariwisata',
            'kode_prodi' => '93301',
            'jenjang_pendidikan' => 'D4',
            'id_prodi_feeder' => 'e4e9fd54-7813-4ba2-b9fa-f7fb58f21de1',
            'id_jurusan' => 5,
        ]);
        Prodi::create([
            'id' => 8,
            'nama' => 'Teknik Mesin',
            'kode_prodi' => '21401',
            'jenjang_pendidikan' => 'D3',
            'id_prodi_feeder' => '84df565b-b28e-45b2-b1c4-af502a0a8cf6',
            'id_jurusan' => 3,
        ]);
        Prodi::create([
            'id' => 9,
            'nama' => 'Bisnis Digital',
            'kode_prodi' => '61316',
            'jenjang_pendidikan' => 'D4',
            'id_prodi_feeder' => 'f45e51b0-4a08-427e-8ec6-8e94092dd900',
            'id_jurusan' => 1,
        ]);
        Prodi::create([
            'id' => 10,
            'nama' => 'Teknik Manufaktur Kapal',
            'kode_prodi' => '21302',
            'jenjang_pendidikan' => 'D4',
            'id_prodi_feeder' => '2c517689-19e3-4927-8523-87957a61f5b3',
            'id_jurusan' => 3,
        ]);
        Prodi::create([
            'id' => 11,
            'nama' => 'Teknologi Pengolahan Hasil Ternak',
            'kode_prodi' => '41333',
            'jenjang_pendidikan' => 'D4',
            'id_prodi_feeder' => 'c7a58db1-22f4-4d0d-bf71-2dd797a884f9',
            'id_jurusan' => 4,
        ]);
        Prodi::create([
            'id' => 12,
            'nama' => 'Teknologi Rekayasa Kontruksi Jalan Dan Jembatan',
            'kode_prodi' => '22301',
            'jenjang_pendidikan' => 'D4',
            'id_prodi_feeder' => 'b3251e4f-b900-46e6-b186-ec6f6328dd78',
            'id_jurusan' => 2,
        ]);
        Prodi::create([
            'id' => 13,
            'nama' => 'Destinasi Pariwisata',
            'kode_prodi' => '93304',
            'jenjang_pendidikan' => 'D4',
            'id_prodi_feeder' => '6e4556c9-2b72-4214-a584-e28ee63bae64',
            'id_jurusan' => 5,
        ]);
        Prodi::create([
            'id' => 14,
            'nama' => 'Teknologi Produksi Ternak',
            'kode_prodi' => '54318',
            'jenjang_pendidikan' => 'D4',
            'id_prodi_feeder' => '2813825c-5043-4e23-8931-98170eed5731',
            'id_jurusan' => 4,
        ]);
        Prodi::create([
            'id' => 15,
            'nama' => 'Pengembangan Produk Agroindustri',
            'kode_prodi' => '41313',
            'jenjang_pendidikan' => 'D4',
            'id_prodi_feeder' => 'e87bc4d2-a2ed-45a5-829f-a53a7aaf44f1',
            'id_jurusan' => 4,
        ]);
        Prodi::create([
            'id' => 16,
            'nama' => 'Teknologi Budi Daya Perikanan/Teknologi Akuakultur',
            'kode_prodi' => '54346',
            'jenjang_pendidikan' => 'D4',
            'id_prodi_feeder' => '51113b8e-d5b4-4677-b751-e00972e692da',
            'id_jurusan' => 4,
        ]);
        Prodi::create([
            'id' => 17,
            'nama' => 'Teknologi Produksi Tanaman Pangan',
            'kode_prodi' => '41322',
            'jenjang_pendidikan' => 'D4',
            'id_prodi_feeder' => '568728bd-6400-4dd4-8bcf-7b3ef9263d97',
            'id_jurusan' => 4,
        ]);
    }
}
