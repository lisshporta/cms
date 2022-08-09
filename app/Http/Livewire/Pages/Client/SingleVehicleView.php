<?php

namespace App\Http\Livewire\Pages\Client;

use App\Models\Vehicle;
use Livewire\Component;

class SingleVehicleView extends Component
{
    public $vehicle;
    public $similar;

    public function mount($slug){
        $this->vehicle = Vehicle::where('slug', $slug)->where('published', true)->with('user')->first();
      
        if(!$this->vehicle){
            return abort(404);
        }

        $this->similar = Vehicle::where('published', true)->where('id', '!=', $this->vehicle->id)->where('make', $this->vehicle->make)->where('user_id', $this->vehicle->user_id)->with('user')->latest()->limit(4)->get();
    }

    public function render()
    {
        return view('client.single-vehicle-view')->layout('layouts.public.main');
    }
}
