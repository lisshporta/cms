<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $model = Model::factory()->create();
        $make = $model->make()->first();

        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'name' => $make->name.' '.$model->name,
            'make_id' => $make->id,
            'model_id' => $model->id,
            'body_type' => $this->faker->randomElement([
                'Sedan',
                'HatchBack',
                'SUV',
                'Van',
                'Truck',
                'Wagon',
                'Bus',
                'Coupe',
            ]),
            'year' => $this->faker->biasedNumberBetween(1998, 2017, 'sqrt'),
            'price' => 4500000,
            'color' => $this->faker->colorName(),
            'engine' => '1,5L',
            'fuel_type' => 'petrol',
            'mileage' => 20000,
            'door_count' => $this->faker->biasedNumberBetween(2, 4),
            'seat_count' => $this->faker->biasedNumberBetween(4, 7),
            'gearbox' => 'any',
            'published' => true,
            'features' => [],
            'sections' => [],
            'images' => [],
        ];
    }
}
