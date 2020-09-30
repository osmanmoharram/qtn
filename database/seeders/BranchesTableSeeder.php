<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
            [
                'name' => 'QTN Main Branch',
                'location' => '60st Manshia'
            ],

            [
                'name' => 'QTN West Branch',
                'location' => 'Khartoum-2'
            ]
        ];

        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}
