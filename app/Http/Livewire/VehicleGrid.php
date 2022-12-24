<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Livewire\Component;
use MeiliSearch\Exceptions\ApiException;

class VehicleGrid extends Component
{
    public int $year;

    public string $search = '';

    public array $makes = [];

    public ?array $bodies = [];

    protected $listeners = ['resetMakes', 'resetBodies', 'filterMakes', 'filterBodies'];

    public function resetMakes()
    {
        $this->makes = [];
    }

    public function resetBodies()
    {
        $this->bodies = [];
    }

    public function filterBodies(string $body)
    {
        if (in_array($body, $this->bodies)) {
            array_pop($this->bodies);
        } else {
            $this->bodies[] = $body;
        }
    }

    public function filterMakes(string $make)
    {
        if (in_array($make, $this->makes)) {
            array_pop($this->makes);
        } else {
            $this->makes[] = $make;
        }
    }

    public function render()
    {
        try {
            $listings = Vehicle::search($this->search)->get();

            if ($this->makes) {
                $listings = $listings->whereIn('make', $this->makes);
            }

            if ($this->bodies) {
                $listings = $listings->whereIn('body_type', $this->bodies);
            }
        } catch (ApiException $error) {
            $listings = [];
        }

        return view('livewire.vehicle-grid', [
            'count' => Vehicle::all()->count(),
            'listings' => $listings,
        ]);
    }
}
