<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'akademik',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'wadir',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'admin-jurusan',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'kaprodi',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'dosen',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'dosen-wali',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'dosen-pembimbing',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'koordinator',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'mahasiswa',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'mitra',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'pl-mitra',
            'guard_name' => 'web'
        ]);
    }
}
