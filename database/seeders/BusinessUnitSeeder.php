<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $business_unit = [
            [
                'name' => 'Finance & Accounting',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Human Resources',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'IT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Marketing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sales',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('business_units')->insert($business_unit);
    }
}
