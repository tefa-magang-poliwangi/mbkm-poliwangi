<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\KategoriSeeder;
use Database\Seeders\SektorIndustriSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ProdiSeeder::class,
            PeriodeSeeder::class,
            MagangExternalSeeder::class,
            MatkulSeeder::class,
            KategoriSeeder::class,
            SektorIndustriSeeder::class,
        ]);
    }
}
