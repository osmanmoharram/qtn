<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModelHasRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['role_id' => 1, 'model_type' => 'App\Models\User', 'model_id' => 1],
            ['role_id' => 2, 'model_type' => 'App\Models\User', 'model_id' => 2],
            ['role_id' => 3, 'model_type' => 'App\Models\User', 'model_id' => 3],
            ['role_id' => 4, 'model_type' => 'App\Models\User', 'model_id' => 4],
            ['role_id' => 5, 'model_type' => 'App\Models\User', 'model_id' => 5],
            ['role_id' => 6, 'model_type' => 'App\Models\User', 'model_id' => 6],
        ];

        foreach ($roles as $role) {
            $r = ModelRole::create($role);
        }
    }
}
