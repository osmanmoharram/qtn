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
        $users = [
            ['id' => 1, 'name' => 'Accounting'],
            ['id' => 2, 'name' => 'Procurements'],
            ['id' => 3, 'name' => 'Sales'],
            ['id' => 4, 'name' => 'IT'],
            ['id' => 5, 'name' => 'Storage'],
        ];

        foreach ($users as $user) {
            $r = Department::create($user);
        }
    }
}
