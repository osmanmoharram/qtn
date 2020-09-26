<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => 1, 'name' => 'Super admin', 'guard_name' => 'web'],
            ['id' => 2, 'name' => 'Branch manager', 'guard_name' => 'web'],
            ['id' => 3, 'name' => 'Employee', 'guard_name' => 'web'],
            ['id' => 4, 'name' => 'Store manager', 'guard_name' => 'web'],
            ['id' => 5, 'name' => 'Department manager', 'guard_name' => 'web'],
            ['id' => 6, 'name' => 'Procurement manager', 'guard_name' => 'web'],
        ];

        foreach ($roles as $role) {
            $r = \Spatie\Permission\Models\Role::create($role);
        }

        $permissions = [
            ['id' => 1, 'name' => 'Administration', 'guard_name' => 'web']
        ];

        foreach ($permissions as $permission) {
            $p = \Spatie\Permission\Models\Permission::create($permission);
        }

        $admin_role = \Spatie\Permission\Models\Role::findByName('Super admin');
        $admin_permission = \Spatie\Permission\Models\Permission::findByName('Administration');
        $admin_role->givePermissionTo($admin_permission);
    }
}
