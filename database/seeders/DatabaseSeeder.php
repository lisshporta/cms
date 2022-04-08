<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\Vehicle::factory(30)->create();

        $this->call([
            BodyTypeSeeder::class,
            FuelTypeSeeder::class,
            MakeSeeder::class,
        ]);
    }
}
