<?php

namespace Database\Seeders;

use App\Models\Mitra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mitra::create([
            'id' => 1,
            'nama' => 'Gits Indonesia',
            'alamat' => 'Rogojampi - Kedaleman',
            'kota' => 'Banyuwangi',
            'provinsi' => 'Jawa Timur',
            'narahubung' => 'Nanda Awimbi Yahya',
            'email' => 'gitsindonesia@gmail.com',
            'status' => 'Aktif',
            'username' => 'gitsindonesia',
            'password' => bcrypt('gits1234'),
            'id_sektor_industri' => 1,
            'id_kategori' => 1,
        ]);
    }
}
