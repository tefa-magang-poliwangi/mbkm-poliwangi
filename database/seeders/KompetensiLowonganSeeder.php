<?php

namespace Database\Seeders;

use App\Models\KompetensiLowongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KompetensiLowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KompetensiLowongan::create([
            'kompetensi' => 'Kompetensi 1',
                'id_lowongan' => 1, // Ganti ID lowongan yang sesuai
        ]);

        KompetensiLowongan::create([
            'kompetensi' => 'Kompetensi 2',
                'id_lowongan' => 2, // Ganti ID lowongan yang sesuai
        ]);
    }
}
