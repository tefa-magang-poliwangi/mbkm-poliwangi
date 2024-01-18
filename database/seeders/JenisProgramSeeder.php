<?php

namespace Database\Seeders;

use App\Models\JenisProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisProgram::create([
            'id' => 1,
            'nama_program' => 'Kampus Mengajar',
        ]);

        JenisProgram::create([
            'id' => 2,
            'nama_program' => 'Magang Bersertifikat',
        ]);

        JenisProgram::create([
            'id' => 3,
            'nama_program' => 'Studi Independen Bersertifikat',
        ]);

        JenisProgram::create([
            'id' => 4,
            'nama_program' => 'Pertukaran Mahasiswa Merdeka',
        ]);

        JenisProgram::create([
            'id' => 5,
            'nama_program' => 'Wirausaha Merdeka',
        ]);

        JenisProgram::create([
            'id' => 6,
            'nama_program' => 'Indonesian International Student Mobility Awards',
        ]);

        JenisProgram::create([
            'id' => 7,
            'nama_program' => 'Praktisi Mengajar',
        ]);

        JenisProgram::create([
            'id' => 8,
            'nama_program' => 'Bangkit',
        ]);

        JenisProgram::create([
            'id' => 9,
            'nama_program' => 'Gerilya',
        ]);
    }
}