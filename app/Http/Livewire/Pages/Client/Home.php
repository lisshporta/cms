<?php

namespace App\Http\Livewire\Pages\Client;

use App\Models\User;
use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public function render()
    {
        $listings = Vehicle::where('published', true)->where('user_id', tenant('user_id'))->paginate(20);
        $owner = User::where('id', tenant('user_id'))->first();

        return view('client.home', [
            'listings' => $listings,
            'owner' => $owner
        ])->layout('layouts.public.main');
    }
}
