<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'name' => 'iPhone 11 Pro', 'category_id' => 1, 'quantity' => 5, 'description' => 'Product description.'],
            ['id' => 2, 'name' => 'iPhone 11 Pro Max', 'category_id' => 1, 'quantity' => 2, 'description' => 'Product description.'],
            ['id' => 3, 'name' => 'Galaxy S20', 'category_id' => 1, 'quantity' => 11, 'description' => 'Product description.'],
            ['id' => 4, 'name' => 'Samsung CTM740 LCD', 'category_id' => 2, 'quantity' => 4, 'description' => 'Product description.'],
            ['id' => 5, 'name' => 'LG QR55 OLED', 'category_id' => 2, 'quantity' => 1, 'description' => 'Product description.'],
            ['id' => 6, 'name' => 'LG QR65 OLED', 'category_id' => 2, 'quantity' => 1, 'description' => 'Product description.'],
            ['id' => 7, 'name' => 'Tefal M4356 Iron', 'category_id' => 3, 'quantity' => 7, 'description' => 'Product description.'],
            ['id' => 8, 'name' => 'Molenix P890 mixer', 'category_id' => 3, 'quantity' => 0, 'description' => 'Product description.'],
            ['id' => 9, 'name' => 'Braun D30 Boiler', 'category_id' => 3, 'quantity' => 9, 'description' => 'Product description.'],
            ['id' => 10, 'name' => 'Playstation 3', 'category_id' => 4, 'quantity' => 10, 'description' => 'Product description.'],
            ['id' => 11, 'name' => 'Playstation 4', 'category_id' => 4, 'quantity' => 6, 'description' => 'Product description.'],
            ['id' => 12, 'name' => 'Playstation 5', 'category_id' => 4, 'quantity' => 0, 'description' => 'Product description.'],
            ['id' => 13, 'name' => 'Xbox 360', 'category_id' => 4, 'quantity' => 2, 'description' => 'Product description.'],
            ['id' => 14, 'name' => 'Aeolos 1200R24', 'category_id' => 5, 'quantity' => 20, 'description' => 'Product description.'],
            ['id' => 15, 'name' => 'Hankook 365/85R22.5', 'category_id' => 5, 'quantity' => 26, 'description' => 'Product description.'],
        ];

        foreach ($users as $user) {
            $r = Product::create($user);
        }
    }
}
