<?php

namespace Database\Seeders;

use App\Models\Matkul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Matkul::create([
            'id' => 1,
            'nama' => 'Pemograman Berbasis Objek',
            'kode_matakuliah' => 'Rpl12345',
            'sks' => 4,
            'id_prodi' => 1,
        ]);
        Matkul::create([
            'id' => 2,
            'nama' => 'Basis Data',
            'kode_matakuliah' => 'Rpl12346',
            'sks' => 3,
            'id_prodi' => 1,
        ]);
        Matkul::create([
            'id' => 3,
            'nama' => 'Tata Kelola IT',
            'kode_matakuliah' => 'Rpl12347',
            'sks' => 2,
            'id_prodi' => 1,
        ]);
        Matkul::create([
            'id' => 4,
            'nama' => 'Sistem Informasi',
            'kode_matakuliah' => 'Rpl12348',
            'sks' => 3,
            'id_prodi' => 1,
        ]);
        Matkul::create([
            'id' => 5,
            'nama' => 'E - Bisnis',
            'kode_matakuliah' => 'Rpl12349',
            'sks' => 3,
            'id_prodi' => 1,
        ]);
    }
}
