<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function index()
    {
        return view('admin.cars.index');
    }

    public function new()
    {
        return view('admin.cars.new');
    }

    public function update(Request $request)
    {
        $vehicle = Vehicle::where('id', $request->id)->where('user_id', Auth::user()->id)->first();
        if (! $vehicle) {
            return abort(404);
        }

        return view('admin.cars.update', ['vehicle' => $vehicle]);
    }
}
