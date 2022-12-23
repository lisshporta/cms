<?php

namespace App\Http\Livewire;

use App\Enums\BodyType;
use App\Models\Make;
use App\Models\Vehicle;
use Livewire\Component;
use MeiliSearch\Exceptions\ApiException;

class VehicleGrid extends Component
{
    public int $year;
    public string $search = "";
    public string $make = "";
    public ?string $body = "";

    protected $listeners = ['resetMakes', 'resetBodies','filterMakes', 'filterBodies'];

    public function resetMakes(){
        $this->make = "";
    }

    public function filterMakes(string $make){
        $this->make = $make;
    }

    public function resetBodies(){
        $this->body = "";
    }

    public function filterBodies(string $body) {
        $this->body = $body;
    }

    public function render()
    {
        try {
            $listings = Vehicle::search($this->search)->get();

            if ($this->make) {
                $listings = $listings->where('make', $this->make);
            }

            if ($this->body) {
                $listings = $listings->where('body_type', $this->body);
            }
        } catch (ApiException $error) {
            $listings = [];
        }

        return view('livewire.vehicle-grid', [
            'count' => Vehicle::all()->count(),
            'listings' => $listings
        ]);
    }
}
