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
        Jurusan::create([
            'id' => 1,
            'nama_jurusan' => 'Jurusan Bisnis dan Informatika',
        ]);

        Jurusan::create([
            'id' => 2,
            'nama_jurusan' => 'Jurusan Teknik Sipil',
        ]);

        Jurusan::create([
            'id' => 3,
            'nama_jurusan' => 'Jurusan Teknik Mesin',
        ]);

        Jurusan::create([
            'id' => 4,
            'nama_jurusan' => 'Jurusan Teknik Pertanian',
        ]);

        Jurusan::create([
            'id' => 5,
            'nama_jurusan' => 'Jurusan Pariwisata',
        ]);
    }
}
