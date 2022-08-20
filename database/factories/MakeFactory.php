<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Make>
 */
class MakeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $makes = ['Abarth',
            'Alfa Romeo',
            'Aston Martin',
            'Audi',
            'Bentley',
            'BMW',
            'Bugatti',
            'Cadillac',
            'Chevrolet',
            'Chrysler',
            'Citroën',
            'Dacia',
            'Daewoo',
            'Daihatsu',
            'Dodge',
            'Donkervoort',
            'DS',
            'Ferrari',
            'Fiat',
            'Fisker',
            'Ford',
            'Honda',
            'Hummer',
            'Hyundai',
            'Infiniti',
            'Iveco',
            'Jaguar',
            'Jeep',
            'Kia',
            'KTM',
            'Lada',
            'Lamborghini',
            'Lancia',
            'Land Rover',
            'Landwind',
            'Lexus',
            'Lotus',
            'Maserati',
            'Maybach',
            'Mazda',
            'McLaren',
            'Mercedes-Benz',
            'MG',
            'Mini',
            'Mitsubishi',
            'Morgan',
            'Nissan',
            'Opel',
            'Peugeot',
            'Porsche',
            'Renault',
            'Rolls-Royce',
            'Rover',
            'Saab',
            'Seat',
            'Skoda',
            'Smart',
            'SsangYong',
            'Subaru',
            'Suzuki',
            'Tesla',
            'Toyota',
            'Volkswagen',
            'Volvo',
        ];

        return [
            'name' => $makes[array_rand($makes)]
        ];
    }
}
