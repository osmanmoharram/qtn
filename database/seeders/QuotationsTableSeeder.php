<?php

namespace Database\Seeders;

use App\Models\Quotation;
use Illuminate\Database\Seeder;

class QuotationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'customer_id' => 1, 'department_id' => 3, 'request_date' => '2020-01-15', 'status' => 'approved'],
            ['id' => 2, 'customer_id' => 2, 'department_id' => 3, 'request_date' => '2020-02-20', 'status' => 'approved'],
            ['id' => 3, 'customer_id' => 3, 'department_id' => 3, 'request_date' => '2020-03-01', 'status' => 'approved'],
            ['id' => 4, 'customer_id' => 1, 'department_id' => 3, 'request_date' => '2020-04-05', 'status' => 'rejected', 'rejection_reason' => 'No stock'],
            ['id' => 5, 'customer_id' => 4, 'department_id' => 3, 'request_date' => '2020-05-22', 'require_admin_approval' => true, 'status' => 'approved'],
            ['id' => 6, 'customer_id' => 5, 'department_id' => 3, 'request_date' => '2020-08-13', 'status' => 'approved'],
            ['id' => 7, 'customer_id' => 3, 'department_id' => 3, 'request_date' => '2020-09-23', 'status' => 'new'],
        ];

        foreach ($users as $user) {
            $r = Quotation::create($user);
        }
    }
}
