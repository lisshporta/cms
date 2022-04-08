<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Livewire\Component;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class CarTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Vehicle::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('make'),
            Tables\Columns\TextColumn::make('model'),
            Tables\Columns\TextColumn::make('body_type'),
            Tables\Columns\TextColumn::make('color'),
            Tables\Columns\TextColumn::make('engine'),
            Tables\Columns\TextColumn::make('fuel_type'),
        ];
    }

    public function render()
    {
        return view('livewire.car-table');
    }
}
