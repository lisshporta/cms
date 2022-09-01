<?php

namespace App\Http\Livewire\Pages;

use App\Models\BodyType;
use App\Models\Make;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class ExplorePage extends Component
{
    use WithPagination;

    public $search = null;

    public $make = null;

    public $body = null;

    protected $queryString = ['search', 'make', 'body'];

    public function render()
    {
        $listings = Vehicle::search($this->search)->query(function (Builder $builder) {
            $builder->with('user.tenant');
        });

        if ($this->make) {
            $listings->where('make', $this->make);
        }

        if ($this->body) {
            $listings->where('body_type', $this->body);
        }

        return view('livewire.pages.explore', [
            'makes' => Make::orderBy('name', 'asc')->get(),
            'body_types' => BodyType::orderBy('name', 'asc')->get(),
        ])->layout('layouts.public.main');
    }
}
