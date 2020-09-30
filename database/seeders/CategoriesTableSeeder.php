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
        $categories = [
            ['name' => 'Mobiles phones'],
            ['name' => 'TVs'],
            ['name' => 'Home appliances'],
            ['name' => 'Entertainments'],
            ['name' => 'Tires'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
