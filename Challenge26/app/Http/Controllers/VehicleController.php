<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Http\Resources\VehicleResource;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return VehicleResource::collection($vehicles);
    }

    public function dashboard()
    {
        return view('vehicles.dashboard');
    }

    public function create()
    {
        return view('vehicles.create');
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'plate_number' => 'required|string|max:255',
            'insurance_date' => 'required|date',
        ]);


        $vehicle = Vehicle::create($validated);


        return (new VehicleResource($vehicle))
            ->additional(['message' => 'Vehicle created successfully!'])
            ->response()
            ->setStatusCode(201);
    }


    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }


    public function update(Request $request, Vehicle $vehicle)
    {

        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'plate_number' => 'required|string|max:255',
            'insurance_date' => 'required|date',
        ]);

        $vehicle->update($validated);


        return (new VehicleResource($vehicle))
            ->additional(['message' => 'Vehicle updated successfully!'])
            ->response()
            ->setStatusCode(201);
    }


    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return (new VehicleResource($vehicle))
            ->additional(['message' => 'Vehicle deleted successfully!'])
            ->response()
            ->setStatusCode(201);
    }
}
