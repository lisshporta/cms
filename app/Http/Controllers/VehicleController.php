<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->slug;
        $vehicle = Vehicle::where('slug', $slug)->with('user')->first();

        if (! $vehicle) {
            return abort(404);
        }

        $similarVehicles = Vehicle::where('published', true)->where('id', '!=', $vehicle->id)->where('make', $vehicle->make)->where('user_id', $vehicle->user_id)->with('user')->latest()->limit(4)->get();

        return view('vehicle.index', ['vehicle' => $vehicle, 'similarVehicles' => $similarVehicles]);
    }
}
