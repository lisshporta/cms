<?php

namespace App\Http\Livewire\Forms\Car;

use App\Models\BodyType;
use App\Models\FuelType;
use App\Models\Make;
use App\Models\Model;
use App\Models\Vehicle;
use Filament\Forms;
use Livewire\Component;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class UpdateCar extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public Vehicle $vehicle;

    public function mount(): void
    {
        $this->form->fill([
            'name' => $this->vehicle->name,
            'make' => $this->vehicle->make,
            'model' => $this->vehicle->model,
            'body_type' => $this->vehicle->body_type,
            'year' => $this->vehicle->year,
            'price' => $this->vehicle->price,
            'color' => $this->vehicle->color,
            'engine' => $this->vehicle->engine,
            'fuel_type' => $this->vehicle->fuel_type,
            'mileage' => $this->vehicle->mileage,
            'door_count' => $this->vehicle->door_count,
            'seat_count' => $this->vehicle->seat_count,
            'gearbox' => $this->vehicle->gearbox,
            'condition' => $this->vehicle->condition,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make([
                'default' => 1,
                'sm' => 2,
                'lg' => 4,
            ])
                ->schema([
                    TextInput::make('name')->required()->columnSpan([
                        'default' => 1,
                        'sm' => 1,
                        'lg' => 3,
                    ]),
                    Select::make('condition')
                        ->options([
                            'New' => 'New',
                            'Used' => 'Used',
                        ])
                        ->default('New')
                        ->afterStateHydrated(fn ($state) => $state)
                        ->required(),
                ]),
            Grid::make([
                'default' => 1,
                'sm' => 2,
                'md' => 2,
                'lg' => 4,
            ])
                ->schema([
                    Select::make('make')
                        ->label('Make')
                        ->options(Make::all()->pluck('name', 'id'))
                        ->required()
                        ->dehydrateStateUsing(function ($state) {
                            if (is_numeric($state)) {
                                return Make::where('id', $state)->first()->name;
                            }
                            return $state;
                        })
                        ->searchable(),
                    Select::make('model')
                        ->label('Model')
                        ->options(Model::all()->pluck('name', 'id'))
                        ->dehydrateStateUsing(function ($state) {
                            if (is_numeric($state)) {
                                return Model::where('id', $state)->first()->name;
                            }
                            return $state;
                        })
                        ->required()
                        ->searchable(),
                    Select::make('body_type')
                        ->label('Body Type')
                        ->options(BodyType::all()->pluck('name', 'id'))
                        ->required()
                        ->dehydrateStateUsing(function ($state) {
                            if (is_numeric($state)) {
                                return BodyType::where('id', $state)->first()->name;
                            }
                            return $state;
                        })
                        ->searchable(),
                    Select::make('fuel_type')
                        ->label('Fuel Type')
                        ->options(FuelType::all()->pluck('name', 'id'))
                        ->required()
                        ->dehydrateStateUsing(function ($state) {
                            if (is_numeric($state)) {
                                return FuelType::where('id', $state)->first()->name;
                            }
                            return $state;
                        })
                        ->searchable(),
                ]),

            Grid::make([
                'default' => 1,
                'sm' => 2,
                'md' => 2,
                'lg' => 4,
            ])
                ->schema([
                    TextInput::make('year')->default(Carbon::now()->year)->length(4)->required(),
                    TextInput::make('color')->required(),
                    TextInput::make('door_count')->label('Door Count')->default(4)->numeric()->required(),
                    TextInput::make('seat_count')->label('Seat Count')->default(5)->numeric()->required(),
                ]),
            Grid::make([
                'default' => 1,
                'sm' => 2,
                'md' => 2,
                'lg' => 4,
            ])
                ->schema([
                    TextInput::make('price')->mask(fn (TextInput\Mask $mask) => $mask
                        ->patternBlocks([
                            'money' => fn (TextInput\Mask $mask) => $mask
                                ->numeric()
                                ->thousandsSeparator(',')
                                ->decimalSeparator('.'),
                        ])->pattern('JMD $money')),
                    TextInput::make('mileage')->numeric()->default(0)->label('Mileage (in km)')->required(),
                    TextInput::make('engine')->required(),
                    Select::make('gearbox')
                        ->options([
                            'Automatic' => 'Automatic',
                            'Manual' => 'Manual',
                        ])
                        ->default('Automatic')
                        ->afterStateHydrated(fn ($state) => $state)
                        ->required(),
                ])
        ];
    }

    protected function getFormModel(): Vehicle
    {
        return $this->vehicle;
    }

    public function submit(): void
    {
        $this->vehicle->update($this->form->getState());
        Redirect::back();
    }


    public function render()
    {
        return view('livewire.forms.car.new');
    }
}
