<?php

namespace App\Http\Livewire\Tables;

use App\Models\Vehicle;
use Livewire\Component;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class Car extends Component implements Tables\Contracts\HasTable
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
            Tables\Columns\TextColumn::make('body_type')->label('Body Type'),
            Tables\Columns\TextColumn::make('color'),
            Tables\Columns\TextColumn::make('engine'),
            Tables\Columns\TextColumn::make('fuel_type')->label('Fuel'),
        ];
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [25, 50, 100];
    }


    public function render()
    {
        return view('livewire.tables.car.all');
    }
}
