<?php

namespace Database\Seeders;

use App\Models\Dispatch;
use Illuminate\Database\Seeder;

class DispatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dispatchs = [
            ['department_id' => 5, 'employee_id' => 2, 'request_date' => '2020-03-19', 'status' => 'received'],
            ['department_id' => 5, 'employee_id' => 2, 'request_date' => '2020-09-24', 'status' => 'new'],
        ];

        foreach ($dispatchs as $dispatch) {
            Dispatch::create($dispatch);
        }
    }
}
