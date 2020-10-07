<?php

namespace Database\Seeders;

use App\Models\Store\Request;
use Illuminate\Database\Seeder;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'employee_id' => 2, 'request_date' => '2020-04-19', 'status' => 'approved'],
            ['id' => 2, 'employee_id' => 2, 'request_date' => '2020-06-28', 'status' => 'approved'],
        ];

        foreach ($users as $user) {
            $r = Request::create($user);
        }
    }
}
