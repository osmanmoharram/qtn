<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'name' => 'Mobiles phones'],
            ['id' => 2, 'name' => 'TVs'],
            ['id' => 3, 'name' => 'Home appliances'],
            ['id' => 4, 'name' => 'Entertainments'],
            ['id' => 5, 'name' => 'Tires'],
        ];

        foreach ($users as $user) {
            $r = Category::create($user);
        }
    }
}
