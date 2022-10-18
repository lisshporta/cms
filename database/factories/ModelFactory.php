<?php

namespace Database\Factories;

use App\Models\Make;
use App\Models\Model;
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
        $make_id = Make::all()->random()->id;
        $model = Model::all()->first();

        //Choose a random model
        return [
            'make_id' => $make_id,
            'name' => $model->name,
        ];
    }
}
