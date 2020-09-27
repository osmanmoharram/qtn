<?php

namespace Database\Seeders;

use App\Models\OrderProduct;
use Illuminate\Database\Seeder;

class OrderProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['product_id' => 8, 'order_id' => 1, 'quantity' => 5, 'unit_price' => 4000],
        ];

        foreach ($users as $user) {
            $r = OrderProduct::create($user);
        }
    }
}
