<?php

namespace App\Http\Livewire\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class DeleteButton extends Component
{
    public bool $confirmingDeletion;

    public Model $model;

    public $route;

    public function mount($model, $route)
    {
        $this->model = $model;
        $this->route = $route;
        $this->confirmingDeletion = false;
    }

    public function render()
    {
        return view('livewire.components.delete-button');
    }

    public function delete()
    {
        try {
            $this->model->delete();
            flash()->success('Item deleted successfully.');
        } catch (\Throwable $th) {
            flash()->error('An unexpected error occured while removing this item.');
            $previous = URL::previous();

            return redirect($previous);
        }

        return redirect($this->route);
    }
}
