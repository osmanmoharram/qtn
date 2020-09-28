<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'name' => 'CTC Ltd.'],
            ['id' => 2, 'name' => 'Al Junaid for Home Appliances'],
            ['id' => 3, 'name' => 'BlueRay for Gaming Store'],
            ['id' => 4, 'name' => 'Morooz for Trading Co. Ltd.'],
            ['id' => 5, 'name' => 'Nova Phones'],
        ];

        foreach ($users as $user) {
            $r = Supplier::create($user);
        }
    }
}
