<?php

namespace Database\Seeders;

use App\Models\BusinessUnit;
use App\Models\KeyResultArea;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            RoleSeeder::class,
            BusinessUnitSeeder::class,
            KeyResultAreaSeeder::class,
          ]);
    }
}
