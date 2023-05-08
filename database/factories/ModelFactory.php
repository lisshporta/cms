<?php

namespace Database\Factories;

use App\Constants\VehicleHashTable;
use App\Models\Make;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // All  this does is get a random Make and Model and ensure
        // that they are associated with each other

        $vehicleHashTable = new VehicleHashTable();
        $vehicles = $vehicleHashTable->getAllVehicles();
        $models = $vehicles[array_rand($vehicles)];
        $makes = array_keys($vehicles);
        $randomMake = $makes[array_rand($makes)];

        $make = Make::factory()->create(['name' => $randomMake]);
        $randomModel = $models[array_rand($models)];

        return [
            'make_id' => $make->id,
            'name' => $randomModel,
        ];
    }
}
