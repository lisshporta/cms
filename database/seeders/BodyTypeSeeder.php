<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BodyType;

class BodyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Sedan',
            'HatchBack',
            'SUV',
            'Van',
            'Truck',
            'Wagon',
            'Bus',
            'Coupe',
        ];

        foreach ($types as $type) {
            BodyType::create([
                'name' => $type,
            ]);
        }
    }
}
