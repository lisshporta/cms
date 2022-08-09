<?php

namespace Database\Seeders;

use App\Models\Make;
use Illuminate\Database\Seeder;

class MakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $makes = [
            'Honda',
            'BMW',
            'Audi',
        ];

        foreach ($makes as $make) {
            Make::create([
                'name' => $make,
            ]);
        }
    }
}
