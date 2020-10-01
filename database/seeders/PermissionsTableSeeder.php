<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['id' => 1, 'name' => 'create branch', 'guard_name' => 'web'],
            ['id' => 2, 'name' => 'view branch', 'guard_name' => 'web'],
            ['id' => 3, 'name' => 'update branch', 'guard_name' => 'web'],
            ['id' => 4, 'name' => 'delete branch', 'guard_name' => 'web'],
            ['id' => 5, 'name' => 'create department', 'guard_name' => 'web'],
            ['id' => 6, 'name' => 'view department', 'guard_name' => 'web'],
            ['id' => 7, 'name' => 'update department', 'guard_name' => 'web'],
            ['id' => 8, 'name' => 'delete department', 'guard_name' => 'web'],
            ['id' => 9, 'name' => 'create employee', 'guard_name' => 'web'],
            ['id' => 10, 'name' => 'view employee', 'guard_name' => 'web'],
            ['id' => 11, 'name' => 'update employee', 'guard_name' => 'web'],
            ['id' => 12, 'name' => 'delete employee', 'guard_name' => 'web'],
            ['id' => 13, 'name' => 'assign employee to branch', 'guard_name' => 'web'],
            ['id' => 14, 'name' => 'create quotation', 'guard_name' => 'web'],
            ['id' => 15, 'name' => 'view quotation', 'guard_name' => 'web'],
            ['id' => 16, 'name' => 'update quotation', 'guard_name' => 'web'],
            ['id' => 17, 'name' => 'delete quotation', 'guard_name' => 'web'],
            ['id' => 18, 'name' => 'assign quotation to customer', 'guard_name' => 'web'],
            ['id' => 19, 'name' => 'update quotation status', 'guard_name' => 'web'],
            ['id' => 20, 'name' => 'create product', 'guard_name' => 'web'],
            ['id' => 21, 'name' => 'view product', 'guard_name' => 'web'],
            ['id' => 22, 'name' => 'update product', 'guard_name' => 'web'],
            ['id' => 23, 'name' => 'delete product', 'guard_name' => 'web'],
            ['id' => 24, 'name' => 'update product quantity', 'guard_name' => 'web'],
            ['id' => 25, 'name' => 'create category', 'guard_name' => 'web'],
            ['id' => 26, 'name' => 'view category', 'guard_name' => 'web'],
            ['id' => 27, 'name' => 'update category', 'guard_name' => 'web'],
            ['id' => 28, 'name' => 'delete category', 'guard_name' => 'web'],
            ['id' => 29, 'name' => 'create customer', 'guard_name' => 'web'],
            ['id' => 30, 'name' => 'view  customer', 'guard_name' => 'web'],
            ['id' => 31, 'name' => 'update customer', 'guard_name' => 'web'],
            ['id' => 32, 'name' => 'delete customer', 'guard_name' => 'web'],
            ['id' => 33, 'name' => 'create supplier', 'guard_name' => 'web'],
            ['id' => 34, 'name' => 'view supplier', 'guard_name' => 'web'],
            ['id' => 35, 'name' => 'update supplier', 'guard_name' => 'web'],
            ['id' => 36, 'name' => 'delete supplier', 'guard_name' => 'web'],
            ['id' => 37, 'name' => 'create RTD', 'guard_name' => 'web'],
            ['id' => 38, 'name' => 'view RTD', 'guard_name' => 'web'],
            ['id' => 39, 'name' => 'update RTD', 'guard_name' => 'web'],
            ['id' => 40, 'name' => 'delete RTD', 'guard_name' => 'web'],
            ['id' => 41, 'name' => 'update RTD status', 'guard_name' => 'web'],
            ['id' => 42, 'name' => 'create RFP', 'guard_name' => 'web'],
            ['id' => 43, 'name' => 'view RFP', 'guard_name' => 'web'],
            ['id' => 44, 'name' => 'update RFP', 'guard_name' => 'web'],
            ['id' => 45, 'name' => 'delete RFP', 'guard_name' => 'web'],
            ['id' => 46, 'name' => 'update RFP status', 'guard_name' => 'web'],
            ['id' => 47, 'name' => 'create proposal', 'guard_name' => 'web'],
            ['id' => 48, 'name' => 'view proposal', 'guard_name' => 'web'],
            ['id' => 49, 'name' => 'update proposal', 'guard_name' => 'web'],
            ['id' => 50, 'name' => 'delete proposal', 'guard_name' => 'web'],
            ['id' => 51, 'name' => 'update proposal status', 'guard_name' => 'web'],
            ['id' => 52, 'name' => 'create PO', 'guard_name' => 'web'],
            ['id' => 53, 'name' => 'view PO', 'guard_name' => 'web'],
            ['id' => 54, 'name' => 'update PO', 'guard_name' => 'web'],
            ['id' => 55, 'name' => 'delete PO', 'guard_name' => 'web'],
            ['id' => 56, 'name' => 'update PO status', 'guard_name' => 'web'],
        ];

        foreach ($permissions as $permission) {
            $r = \Spatie\Permission\Models\Permission::create($permission);
        }
    }
}
