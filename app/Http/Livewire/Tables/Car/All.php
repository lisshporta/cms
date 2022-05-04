<?php

namespace App\Http\Livewire\Tables\Car;

use App\Models\Vehicle;
use Livewire\Component;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Closure;

class All extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Vehicle::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('make')->sortable()->searchable(),
            TextColumn::make('model')->sortable()->searchable(),
            TextColumn::make('body_type')->label('Body Type')->sortable(),
            TextColumn::make('color')->sortable(),
            BadgeColumn::make('condition')
                ->colors([
                    'warning' => 'Used',
                    'success' => 'New',
                ])->sortable(),
            TextColumn::make('fuel_type')->label('Fuel')->sortable(),
        ];
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [50, 100];
    }

    protected function getTableRecordUrlUsing(): Closure
    {
        return fn (Vehicle $record): string => route('car.update', ['id' => $record->id]);
    }

    protected function getTableEmptyStateActions(): array
    {
        return [];
    }


    public function render()
    {
        return view('livewire.tables.car.all');
    }
}
