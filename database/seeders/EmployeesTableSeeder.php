<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            ['name' => 'Osman Moharram','user_id' => 1, 'branch_id' => 1, 'department_id' => 1, 'is_branch_manager' => false, 'is_department_manager' => false],
            ['name' => 'Mohammed Moharram', 'user_id' => 2, 'branch_id' => 1, 'department_id' => 2, 'is_branch_manager' => false, 'is_department_manager' => false],
            ['name' => 'Abubaker Moharram', 'user_id' => 3, 'branch_id' => 1, 'department_id' => 3, 'is_branch_manager' => true, 'is_department_manager' => false],
            ['name' => 'Omer Moharram', 'user_id' => 4, 'branch_id' => 1, 'department_id' => 4, 'is_branch_manager' => false, 'is_department_manager' => true],
            ['name' => 'Ali Moharram', 'user_id' => 5, 'branch_id' => 1, 'department_id' => 5, 'is_branch_manager' => false, 'is_department_manager' => false],
            ['name' => 'Rami Rashikh', 'user_id' => 6, 'branch_id' => 1, 'department_id' => 5, 'is_branch_manager' => false, 'is_department_manager' => false],
            ['name' => 'Rashid Rashikh', 'user_id' => 7, 'branch_id' => 1, 'department_id' => 4, 'is_branch_manager' => false, 'is_department_manager' => false],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
