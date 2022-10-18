<?php

namespace App\Http\Livewire\Forms\Car;

use App\Models\BodyType;
use App\Models\FuelType;
use App\Models\Make;
use App\Models\Vehicle;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class NewVehicle extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public function mount(): void
    {
        $this->form->fill();
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
                    FileUpload::make('cover_path')->image()->directory('images')->label('Cover Image')->columnSpan([
                        'default' => 1,
                        'sm' => 1,
                        'lg' => 3,
                    ]),
                ]),
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
                        ->dehydrateStateUsing(fn($state) => Make::where('id', $state)->first()?->name)
                        ->searchable(),
                    TextInput::make('model')->required(),
                    Select::make('body_type')
                        ->label('Body Type')
                        ->options(BodyType::all()->pluck('name', 'id'))
                        ->required()
                        ->dehydrateStateUsing(fn($state) => BodyType::where('id', $state)->first()?->name)
                        ->searchable(),
                    Select::make('fuel_type')
                        ->label('Fuel Type')
                        ->options(FuelType::all()->pluck('name', 'id'))
                        ->required()
                        ->dehydrateStateUsing(fn($state) => FuelType::where('id', $state)->first()?->name)
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
                    TextInput::make('price')->required()->default('0.00')->mask(fn(TextInput\Mask $mask) => $mask
                        ->patternBlocks([
                            'money' => fn(TextInput\Mask $mask) => $mask
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
                        ->required(),
                ]),
            TagsInput::make('features')->placeholder('eg. Android Auto'),
            Repeater::make('sections')
                ->schema([
                    TextInput::make('name')->required(),
                    TagsInput::make('features')->placeholder('eg. Android Auto')->required(),
                ])
                ->columns(1),
            FileUpload::make('images')->image()->multiple()->directory('images')->label('Images'),
        ];
    }

    public function submit()
    {
        $vehicle = Vehicle::create(array_merge(['user_id' => Auth::user()->id], $this->form->getState()));
        if (!$vehicle) {
            flash()->error('An unexpected error occurred while adding this vehicle.');
            Redirect::route('car.new');
        }

        flash()->success('Vehicle has been added successfully.');
        Redirect::route('car.update', ['id' => $vehicle->id]);
    }

    public function render()
    {
        return view('livewire.forms.car.new');
    }
}