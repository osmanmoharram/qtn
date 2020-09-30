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
        $users = [
            ['id' => 1, 'name' => 'Osman Moharram','user_id' => 1, 'branch_id' => 1, 'department_id' => 1, 'is_branch_manager' => true, 'is_department_manager' => false],
            ['id' => 2, 'name' => 'Mohammed Moharram', 'user_id' => 2, 'branch_id' => 1, 'department_id' => 2, 'is_branch_manager' => false, 'is_department_manager' => false],
            ['id' => 3, 'name' => 'Abubaker Moharram', 'user_id' => 3, 'branch_id' => 1, 'department_id' => 3, 'is_branch_manager' => false, 'is_department_manager' => true],
            ['id' => 4, 'name' => 'Omer Moharram', 'user_id' => 4, 'branch_id' => 1, 'department_id' => 4, 'is_branch_manager' => false, 'is_department_manager' => false],
            ['id' => 5, 'name' => 'Ali Moharram', 'user_id' => 5, 'branch_id' => 1, 'department_id' => 5, 'is_branch_manager' => false, 'is_department_manager' => false],
            ['id' => 6, 'name' => 'Rami Rashikh', 'user_id' => 6, 'branch_id' => 1, 'department_id' => 5, 'is_branch_manager' => false, 'is_department_manager' => false],
        ];

        foreach ($users as $user) {
            $r = Employee::create($user);
        }
    }
}
