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
}
