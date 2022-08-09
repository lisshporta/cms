<?php

namespace Database\Factories;

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
        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));
        $v = $this->faker->vehicleArray();

        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'name' => $v['brand'].' '.$v['model'],
            'make' => $v['brand'],
            'model' => $v['model'],
            'body_type' => $this->faker->vehicleType,
            'year' => $this->faker->biasedNumberBetween(1998, 2017, 'sqrt'),
            'price' => 4500000,
            'color' => $this->faker->colorName(),
            'engine' => '1,5L',
            'fuel_type' => 'petrol',
            'mileage' => 20000,
            'door_count' => $this->faker->vehicleDoorCount,
            'seat_count' => $this->faker->vehicleSeatCount,
            'gearbox' => $this->faker->vehicleGearBoxType,
            'published' => true,
        ];
    }
}
