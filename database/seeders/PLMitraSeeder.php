<?php

namespace Database\Seeders;

use App\Models\PlMitra;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PLMitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlMitra::create([
            'nama' => 'PL Mitra 1',
            'no_telp' => '1234567890',
            'email' => 'plmitra1@example.com',
            'id_mitra' => 1, // Ganti dengan ID Mitra yang sesuai
            'id_user' => 1, // Ganti dengan ID User yang sesuai
        ]);
    }
}
