<?php

namespace Database\Seeders;

use App\Models\Store\ProductRequest;
use Illuminate\Database\Seeder;

class ProductRequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['product_id' => 8, 'request_id' => 1, 'quantity' => 5],
            ['product_id' => 12, 'request_id' => 2, 'quantity' => 10],
        ];

        foreach ($users as $user) {
            $r = ProductRequest::create($user);
        }
    }
}
