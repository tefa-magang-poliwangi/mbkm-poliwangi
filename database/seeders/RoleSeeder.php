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
        $permissions = Permission::all();

        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        // Berikan semua izin ke peran 'admin'
        foreach ($permissions as $permission) {
            $admin->givePermissionTo($permission);
        }
    }
}
