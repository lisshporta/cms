<?php

namespace App\Http\Livewire;

use App\Models\BodyType;
use App\Models\Make;
use Livewire\Component;

class FilterSidebar extends Component
{
    public function render()
    {
        return view('livewire.filter-sidebar', [
            'makes' => Make::orderBy('name', 'asc')->get(),
            'body_types' => BodyType::orderBy('name', 'asc')->get(),
        ]);
    }
}
