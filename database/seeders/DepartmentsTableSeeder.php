<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['name' => 'Accounting'],
            ['name' => 'Procurements'],
            ['name' => 'Sales'],
            ['name' => 'IT'],
            ['name' => 'Storage'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
