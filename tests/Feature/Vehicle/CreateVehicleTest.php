<?php

namespace Tests\Feature\Vehicle;

use App\Models\User;
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
