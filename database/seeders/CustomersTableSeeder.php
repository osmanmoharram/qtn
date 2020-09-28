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
        $users = [
            ['id' => 1, 'name' => 'Ayman Omer'],
            ['id' => 2, 'name' => 'Yassin Mohammed'],
            ['id' => 3, 'name' => 'Mubarak Hassan'],
            ['id' => 4, 'name' => 'Noha Ameen'],
            ['id' => 5, 'name' => 'Sanaa Omer'],
        ];

        foreach ($users as $user) {
            $r = Customer::create($user);
        }
    }
}
