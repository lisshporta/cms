<?php

namespace App\Http\Livewire\Tables;

use App\Models\Vehicle;
use Livewire\Component;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Closure;

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
            TextColumn::make('name'),
            TextColumn::make('make'),
            TextColumn::make('model'),
            TextColumn::make('body_type')->label('Body Type'),
            TextColumn::make('color'),
            TextColumn::make('condition'),
            BadgeColumn::make('condition')
                ->colors([
                    'warning' => 'Used',
                    'success' => 'New',
                ]),
            Tables\Columns\TextColumn::make('fuel_type')->label('Fuel'),
        ];
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [50, 100];
    }

    protected function getTableRecordUrlUsing(): Closure
    {
        return fn (Vehicle $record): string => route('car.edit', ['id' => $record->id]);
    }

    protected function getTableEmptyStateActions(): array
    {
        return [
            Tables\Actions\ButtonAction::make('create')
                ->label('New Car')
                ->url(route('car.new'))
                ->icon('heroicon-o-plus'),
        ];
    }


    public function render()
    {
        return view('livewire.tables.car.all');
    }
}
