<?php

namespace Database\Seeders;

use App\Models\MagangExt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MagangExternalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MagangExt::create([
            'id' => 1,
            'name' => 'Fullstack Developper with Laravel',
            'jenis_magang' => 'Studi Independen',
            'id_periode' => 1,
            'id_prodi' => 1,
        ]);
    }
}
