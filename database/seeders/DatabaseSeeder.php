<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            // RoleSeeder::class,
            UserSeeder::class,

            // KategoriSeeder::class,
            // SektorIndustriSeeder::class,

            // MahasiswaSeeder::class,
            // DosenSeeder::class,
            // MitraSeeder::class,

            // MagangExternalSeeder::class,
            // PeriodeSeeder::class,

            // MatkulSeeder::class,
        ]);
    }
}
