<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class ExplorePage extends Component
{
    public function render()
    {
        return view('livewire.pages.explore')->layout('layouts.public.main');
    }
}
