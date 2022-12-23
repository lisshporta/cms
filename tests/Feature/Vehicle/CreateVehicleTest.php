<?php

namespace Tests\Feature\Vehicle;

use App\Http\Livewire\Forms\Vehicle\NewVehicle;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;

class CreateVehicleTest extends TestCase
{
    /**
     * @group Vehicle
     */
    public function test_can_render_route()
    {
        $user = User::factory()->create();
        $this->actingAs($user)->get(route('admin.inventory.new'))->assertOk();
    }

    public function test_can_create_a_vehicle() {
        $user = User::factory()->create();
        $make = Make::find()->get();
        Livewire::test(NewVehicle::class)
            ->fillForm([
                  "cover_path" => "",
                  "make" => "",
                  "model" => "",
                  "year" => 0,
                  "color" => "red",
                  "body_type" => "HatchBack",
                  "fuel_type" => "Diesel",
                  "door_count" => 4,
                  "seat_count" => 5,
                  "price" => "190000000",
                  "mileage" => 0,
                  "engine" => "4 Stroke",
                  "gearbox" => "Automatic",
                  "features" => [],
                  "sections" => [],
                  "images" => []
                ]);
    }
}
