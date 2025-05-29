<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function getVehicles()
    {
        $vehicles = Vehicle::all();
        return response()->json(['vehicles' => $vehicles]);
    }

    public function addVehicle(Request $request)
    {
        $request->validate([
            'vehiclename' => ['required', 'string', 'max:255'],
            'color' => ['nullable', 'string', 'max:50'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'mileage' => ['nullable', 'integer', 'min:0'],
            'contact' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'document' => ['nullable', 'string', 'max:255'],
            'transmission' => ['nullable', 'string', 'max:50'],
            'condition' => ['nullable', 'string', 'max:50'],
            'features' => ['nullable', 'array'],
            'features.*' => ['string', 'max:100'],
            'status' => ['nullable', 'string', 'in:available,sold,pending'],
        ]);

        $vehicle = Vehicle::create($request->all());

        return response()->json([
            'message' => 'Vehicle successfully created!',
            'vehicle' => $vehicle,
        ]);
    }

    public function editVehicle(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json(['message' => 'Vehicle not found!'], 404);
        }

        $request->validate([
            'vehiclename' => ['required', 'string', 'max:255'],
            'color' => ['nullable', 'string', 'max:50'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'mileage' => ['nullable', 'integer', 'min:0'],
            'contact' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'document' => ['nullable', 'string', 'max:255'],
            'transmission' => ['nullable', 'string', 'max:50'],
            'condition' => ['nullable', 'string', 'max:50'],
            'features' => ['nullable', 'array'],
            'features.*' => ['string', 'max:100'],
            'status' => ['nullable', 'string', 'in:available,sold,pending'],
        ]);

        $vehicle->update($request->all());

        return response()->json([
            'message' => 'Vehicle successfully updated!',
            'vehicle' => $vehicle,
        ]);
    }

    public function deleteVehicle($id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json(['message' => 'Vehicle not found!'], 404);
        }

        $vehicle->delete();

        return response()->json(['message' => 'Vehicle successfully deleted!']);
    }
}
