<?php

namespace Database\Seeders;

use App\Models\FuelType;
use Illuminate\Database\Seeder;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Petrol',
            'Diesel',
            'Hybrid',
            'Electric',
        ];

        foreach ($types as $type) {
            FuelType::create([
                'name' => $type,
            ]);
        }
    }
}
