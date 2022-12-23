<?php

namespace App\Http\Livewire\Pages;

use App\Models\BodyType;
use App\Models\Make;
use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;
use MeiliSearch\Exceptions\ApiException;

class ExplorePage extends Component
{
    public function render()
    {
        return view('livewire.pages.explore')->layout('layouts.public.main');
    }
}
