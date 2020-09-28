<?php

namespace Database\Seeders;

use App\Models\Proposal;
use Illuminate\Database\Seeder;

class ProposalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'supplier_id' => 2, 'department_id' => 2, 'employee_id' => 3, 'quotation_date' => '2020-04-22', 'status' => 'approved'],
            ['id' => 2, 'supplier_id' => 3, 'department_id' => 2, 'employee_id' => 3, 'quotation_date' => '2020-06-30', 'status' => 'pending_approval'],
        ];

        foreach ($users as $user) {
            $r = Proposal::create($user);
        }
    }
}
