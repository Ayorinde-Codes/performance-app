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
                'name' => 'Finance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Business Services & Product Ops.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Corporate Services',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Information Technology',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Internal Control',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Projects & Facility Management',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('business_units')->insert($business_unit);
    }
}