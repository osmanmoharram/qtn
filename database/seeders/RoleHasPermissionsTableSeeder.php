<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::where('name', 'area manager')->first()->givePermissionTo([
            'create branch',
            'update branch',
            'delete branch',
            'view branchs',
            'create department',
            'update department',
            'delete department',
            'view departments',
            'assign branch manager',
            'remove branch manager',
            'create employee',
            'assign employee',
            'approve quotation',
            'decline quotation',
            'view quotations',
        ]);

        Role::where('name', 'branch manager')->first()->givePermissionTo([
            /* Branch Employees */
            'create employee',
            'update employee',
            'delete employee',
            'view employees',

            /* Branch Quotations */
            'approve quotation',
            'decline quotation',
            'view quotations',
        ]);

        Role::where('name', 'department manager')->first()->givePermissionTo([
            'update request status',
            'view requests',
            'update proposal status',
            'view proposals',
        ]);

        Role::where('name', 'store manager')->first()->givePermissionTo([
            'create product',
            'update product',
            'delete product',
            'view products',
            'create request',
            'view orders',
            'update order status',
        ]);

        Role::where('name', 'procurment manager')->first()->givePermissionTo([
            'create proposal',
            'update proposal',
            'update proposal status',
            'delete proposal',
            'view proposals',
            'create order',
            'update order',
            'update order status',
            'delete order',
            'view orders',
            'export order',
        ]);

        Role::where('name', 'employee')->first()->givePermissionTo([
            'create customer',
            /* His/Her Customers */
            'update customer',
            'delete customer',
            'view customers',

            'create quotation',
            /* His/Her Quotations */
            'update quotation',
            'delete quotation',
            'view quotations',
            'assign quotation',
            'approve quotation',
            'decline quotation',
            'export quotation',

            'create product',
            /* His/Her Products */
            'update product',
            'delete product',
            'view products',

            'create category',
            /* His/Her Category */
            'update category',
            'delete category',
            'view categories',

            'create dispatch',
            /* His/Her Dispatches */
            'update dispatch',
            'delete dispatch',
            'view dispatches',
            
            'update order status'
        ]);
    }
}
