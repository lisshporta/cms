<?php

namespace App\Http\Livewire\Vehicle;

use App\Models\Vehicle;
use Closure;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListVehicle extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Vehicle::query()->where('user_id', Auth::user()->id);
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
            BooleanColumn::make('published')->label('Listed')
                ->trueColor('danger')
                ->falseColor('secondary'),
        ];
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [50, 100];
    }

    protected function getTableRecordUrlUsing(): Closure
    {
        return fn (Vehicle $record): string => route('admin.inventory.update', ['id' => $record->id]);
    }

    protected function getTableEmptyStateActions(): array
    {
        return [];
    }

    public function render()
    {
        return view('livewire.tables.vehicle.list-vehicle');
    }
}
