<?php

namespace Tests\Traits;

use App\Models\User;
use App\Models\Vehicle;

trait SetsUpVehicle
{
    private Vehicle $vehicle;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->vehicle = Vehicle::factory()->create();
        $this->user = User::factory()->create();
    }

    public function tearDown(): void
    {
        parent::tearDown();

        $this->user->delete();
        $this->vehicle->delete();
    }
}
