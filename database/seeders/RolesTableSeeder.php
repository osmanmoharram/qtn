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
            ['id' => 3, 'name' => 'Store manager', 'guard_name' => 'web'],
            ['id' => 4, 'name' => 'Department manager', 'guard_name' => 'web'],
            ['id' => 5, 'name' => 'Procurement manager', 'guard_name' => 'web'],
            ['id' => 6, 'name' => 'Employee', 'guard_name' => 'web'],
        ];

        foreach ($roles as $role) {
            $r = \Spatie\Permission\Models\Role::create($role);
        }
    }
}
