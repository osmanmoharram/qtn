<?php

namespace Database\Seeders;

use App\Models\DispatchProduct;
use Illuminate\Database\Seeder;

class DispatchProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dispatch_products = [
            ['dispatch_id' => 1, 'product_id' => 1, 'quantity' => 1],
            ['dispatch_id' => 2, 'product_id' => 10, 'quantity' => 1],
            ['dispatch_id' => 1, 'product_id' => 14, 'quantity' => 2],
        ];

        foreach ($dispatch_products as $dispatch_product) {
            DispatchProduct::create($dispatch_product);
        }
    }
}
