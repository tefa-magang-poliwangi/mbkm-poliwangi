<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::create([
            'id' => 1,
            'nim' => '362055401019',
            'password' => bcrypt('12345678'),
            'nama' => 'Taufik Hidayat',
            'prodi' => 'Teknik Informasi',
            'angkatan' => 20,
            'email' => 'mahasiswa@gmail.com',
            'no_telp' => '081234567890',
        ]);
    }
}
