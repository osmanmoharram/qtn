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
        $order_products = [
            ['product_id' => 8, 'order_id' => 1, 'quantity' => 5, 'unit_price' => 4000],
        ];

        foreach ($order_products as $order_product) {
            OrderProduct::create($order_product);
        }
    }
}
