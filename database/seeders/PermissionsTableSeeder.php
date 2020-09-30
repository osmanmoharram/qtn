<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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
            /* branches */
            'create branch',
            'update branch',
            'delete branch',
            'view branchs',
    
            /* departments */
            'create department',
            'update department',
            'delete department',
            'view departments',
    
            /* employees */
            'create employee',
            'update employee',
            'delete employee',
            'view employees',
            'assign branch manager',
            'remove branch manager',
            'assign employee',
            'remove employee',
    
            /* quotations */
            'create quotation',
            'update quotation',
            'delete quotation',
            'view quotations',
            'approve quotation',
            'decline quotation',
            'assign quotation',
            'export quotation',
    
            /* customers */
            'create customer',
            'update customer',
            'delete customer',
            'view customers',
    
            /* products */
            'create product',
            'update product',
            'delete product',
            'view products',
    
            /* categories */
            'create category',
            'update category',
            'delete category',
            'view categories',
    
            /* dispatches */
            'create dispatch',
            'update dispatch',
            'update dispatch status',
            'delete dispatch',
            'view dispatches',
    
            /* requests */
            'create request',
            'update request',
            'update request status',
            'delete request',
            'view requests',
    
            /* proposals */
            'create proposal',
            'update proposal',
            'update proposal status',
            'delete proposal',
            'view proposals',
    
            /* orders */
            'create order',
            'update order',
            'update order status',
            'delete order',
            'view orders',
            'export order',
        ];

        foreach($permissions as $permission)
        {
            Permission::create([ 'name' => $permission ]);
        }
    }
}
