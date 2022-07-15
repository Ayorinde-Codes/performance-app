<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KeyResultAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kra = [
            [
                'name' => 'Effectiveness',
                'objectives' => 'Ability to carry task effectively.',
                'weight' => '30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Initiatives',
                'objectives' => 'Ability to initiate and execute new ideas and projects.',
                'weight' => '30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Punctuality',
                'objectives' => 'Ability to complete tasks on time.',
                'weight' => '30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('key_result_areas')->insert($kra);  
    }
}
