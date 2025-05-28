<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            // Dashboard Mitra
            'dashboard.mitra.page',

            // Manajemen Plotting Mitra
            'manajemen.plotting.mitra.index',
            'manajemen.plotting.mitra.show',
            'manajemen.plotting.mitra.create',
            'manajemen.plotting.mitra.update',
            'manajemen.plotting.mitra.store',
            'manajemen.plotting.mitra.destroy',

            // Profil Mitra
            'profil.mitra.page',
            'profil.mitra.update',

            // Manajemen Lowongan Mitra
            'manajemen.lowongan.mitra.index',
            'manajemen.lowongan.mitra.create',
            'manajemen.lowongan.mitra.store',
            'manajemen.lowongan.mitra.edit',
            'manajemen.lowongan.mitra.update',
            'manajemen.lowongan.mitra.destroy',

            // Manajemen Sertifikat Mitra
            'manajemen.sertifikat.mitra.index',
            'manajemen.sertifikat.mitra.show',
            'manajemen.sertifikat.mitra.showdetail',
            'manajemen.sertifikat.mitra.store',
            'manajemen.sertifikat.mitra.destroy',

            // Manajemen Logbook Mitra
            'manajemen.mitra.logbook.index',
            'manajemen.mitra.logbook.show',
            'manajemen.mitra.logbook.showdetail',

            // Manajemen Laporan Mingguan
            'manajemen.mitra.lapmingguan.show',

            // Manajemen Laporan Akhir
            'manajemen.mitra.lapakhir.index',
            'manajemen.mitra.lapakhir.show',

            // Manajemen Program Magang
            'manajemen.program.magang.index',
            'manajemen.program.magang.create',
            'manajemen.program.magang.store',
            'manajemen.program.magang.edit',
            'manajemen.program.magang.update',
            'manajemen.program.magang.destroy',

            // Manajemen Berkas Mitra
            'manajemen.berkas.mitra.index',
            'manajemen.berkas.mitra.create',
            'manajemen.berkas.mitra.store',
            'manajemen.berkas.mitra.edit',
            'manajemen.berkas.mitra.update',
            'manajemen.berkas.mitra.destroy',

            // Manajemen Berkas Lowongan Mitra
            'manajemen.berkas-lowongan.mitra.index',
            'manajemen.berkas-lowongan.mitra.create',
            'manajemen.berkas-lowongan.mitra.store',
            'manajemen.berkas-lowongan.mitra.edit',
            'manajemen.berkas-lowongan.mitra.update',
            'manajemen.berkas-lowongan.mitra.destroy',

            // Manajemen Kompetensi Lowongan
            'manajemen.kompetensi.lowongan.index',
            'manajemen.kompetensi.lowongan.store',
            'manajemen.kompetensi.lowongan.update',
            'manajemen.kompetensi.lowongan.destroy',

            // Manajemen Kompetensi Program
            'manajemen.kompetensi.program.index',
            'manajemen.kompetensi.program.create',
            'manajemen.kompetensi.program.store',
            'manajemen.kompetensi.program.destroy',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Buat role mitra jika belum ada
        $role = Role::firstOrCreate(['name' => 'mitra']);

        // Assign semua permission ke role mitra
        $role->syncPermissions($permissions);
    }
}
