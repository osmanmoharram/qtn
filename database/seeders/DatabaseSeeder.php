<?php

namespace Database\Seeders;

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
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(BranchesTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(QuotationsTableSeeder::class);
        $this->call(ProductQuotationTableSeeder::class);
        $this->call(DispatchesTableSeeder::class);
        $this->call(DispatchProductTableSeeder::class);
        $this->call(RequestsTableSeeder::class);
        $this->call(ProductRequestTableSeeder::class);
        $this->call(ProposalsTableSeeder::class);
        $this->call(ProductProposalTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderProductTableSeeder::class);
    }
}
