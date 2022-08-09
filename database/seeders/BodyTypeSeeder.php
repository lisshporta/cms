<?php

namespace Database\Seeders;

use App\Models\BodyType;
use Illuminate\Database\Seeder;

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
