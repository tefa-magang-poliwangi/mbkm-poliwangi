<?php

namespace Database\Seeders;

use App\Models\LowonganPLMitra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LowonganPLMitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LowonganPLMitra::create([
            'kompetensi' => 'Kompetensi 1',
                'id_lowongan' => 1, // Ganti ID lowongan yang sesuai
        ]);

        LowonganPLMitra::create([
            'kompetensi' => 'Kompetensi 2',
                'id_lowongan' => 2, // Ganti ID lowongan yang sesuai
        ]);
    }
}
