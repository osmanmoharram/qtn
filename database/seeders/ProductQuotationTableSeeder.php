<?php

namespace Database\Seeders;

use App\Models\Quotations\ProductQuotation;
use Illuminate\Database\Seeder;

class ProductQuotationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['product_id' => 1, 'quotation_id' => 1, 'quantity' => 1, 'unit_price' => 80000],
            ['product_id' => 3, 'quotation_id' => 2, 'quantity' => 1, 'unit_price' => 75000],
            ['product_id' => 4, 'quotation_id' => 2, 'quantity' => 1, 'unit_price' => 350000],
            ['product_id' => 10, 'quotation_id' => 3, 'quantity' => 2, 'unit_price' => 45000],
            ['product_id' => 8, 'quotation_id' => 4, 'quantity' => 2, 'unit_price' => 35000],
            ['product_id' => 14, 'quotation_id' => 5, 'quantity' => 1, 'unit_price' => 35000],
            ['product_id' => 15, 'quotation_id' => 6, 'quantity' => 1, 'unit_price' => 48000],
            ['product_id' => 1, 'quotation_id' => 7, 'quantity' => 1, 'unit_price' => 80000],
            ['product_id' => 2, 'quotation_id' => 7, 'quantity' => 1, 'unit_price' => 90000],
            ['product_id' => 12, 'quotation_id' => 7, 'quantity' => 1, 'unit_price' => 75000],
        ];

        foreach ($users as $user) {
            $r = ProductQuotation::create($user);
        }
    }
}
