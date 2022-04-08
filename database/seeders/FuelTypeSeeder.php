<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FuelType;

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
