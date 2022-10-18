<?php

use App\Models\Vehicle;

trait SetsUpVehicle
{
    private Vehicle $vehicle;

    public function setUp(): void
    {
        $this->vehicle = Vehicle::factory()->create();
    }

    public function tearDown(): void
    {
        parent::tearDown();

        $this->vehicle->delete();
    }
}
