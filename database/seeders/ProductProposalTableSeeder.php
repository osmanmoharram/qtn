<?php

namespace Database\Seeders;

use App\Models\ProductProposal;
use Illuminate\Database\Seeder;

class ProductProposalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['product_id' => 8, 'proposal_id' => 1, 'quantity' => 5, 'unit_price' => 4000],
            ['product_id' => 12, 'proposal_id' => 2, 'quantity' => 10, 'unit_price' => 80000],
        ];

        foreach ($users as $user) {
            $r = ProductProposal::create($user);
        }
    }
}
