<?php

namespace Database\Seeders;

use App\Models\SektorIndustri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SektorIndustriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SektorIndustri::create([
            'id' => 1,
            'nama' => 'Teknisi',
        ]);
    }
}
