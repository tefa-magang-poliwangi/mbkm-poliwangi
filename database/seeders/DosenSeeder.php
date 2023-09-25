<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dosen::create([
            'id' => 1,
            'nama' => 'Nanda Awimbi Yahya',
            'username' => 'nandaaw',
            'password' => bcrypt('nandaaw123'),
            'prodi' => 'D4 Teknik Rekayasa Perangkat Lunak',
            'no_telp' => '089676298218',
        ]);
    }
}
