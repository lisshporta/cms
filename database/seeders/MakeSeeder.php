<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Make;

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
            'Audi'
        ];

        foreach ($makes as $make) {
            Make::create([
                'name' => $make,
            ]);
        }
    }
}
