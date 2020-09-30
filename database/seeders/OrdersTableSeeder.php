<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            ['supplier_id' => 2, 'employee_id' => 3, 'issued_at' => '2020-04-28', 'status' => 'awaiting'],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
