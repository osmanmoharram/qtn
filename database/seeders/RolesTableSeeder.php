<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
            'area manager', 
            'branch manager',
            'department manager',
            'store manager',
            'procurment manager',
            'employee'
        ];

        foreach ($roles as $role) {
            Role::create([ 'name' => $role ]);
        }
    }
}
