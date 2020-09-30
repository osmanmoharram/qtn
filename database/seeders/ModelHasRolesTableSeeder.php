<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class ModelHasRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::find(2)->assignRole('area manager');
        Employee::find(3)->assignRole('branch manager');
        Employee::find(4)->assignRole('department manager');
        Employee::find(5)->assignRole('store manager');
        Employee::find(1)->assignRole('procurment manager');
        Employee::find(6)->assignRole('employee');
        Employee::find(7)->assignRole('employee');
    }
}
