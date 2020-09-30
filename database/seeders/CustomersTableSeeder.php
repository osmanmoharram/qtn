<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            ['name' => 'Ayman Omer'],
            ['name' => 'Yassin Mohammed'],
            ['name' => 'Mubarak Hassan'],
            ['name' => 'Noha Ameen'],
            ['name' => 'Sanaa Omer'],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
