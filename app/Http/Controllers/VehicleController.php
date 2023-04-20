<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $customer = $user->customer;

        $vehicles = Vehicle::where('customer_id', $customer->id)->get();
        return response()->json($vehicles, 200);
    }

    public function store(Request $request)
    {
        // get user from the request
        $user = $request->user();
        $customer = $user->customer;

        // validate request
        $validated = $request->validate([
            'title' => 'nullable|string',
            'make' => 'required|string',
            'model' => 'required|string',
            'edition' => 'nullable|string',
            'registered_year' => 'nullable|string',
            'registration_number' => 'required|string',
            'current_mileage' => 'nullable|integer',
            'color' => 'nullable|string',
            'remarks' => 'nullable|string',
        ], $request->post());

        $data = [
            'customer_id' => $customer->id,
            'title' => $validated['title'],
            'make' => $validated['make'],
            'model' => $validated['model'],
            'edition' => $validated['edition'],
            'registered_year' => $validated['registered_year'],
            'registration_number' => $validated['registration_number'],
            'current_mileage' => $validated['current_mileage'],
            'color' => $validated['color'],
            'remarks' => $validated['remarks'],
        ];

        $vehicle = Vehicle::create($data);

        return response()->json($vehicle, 201);
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'title' => 'nullable|string',
            'make' => 'required|string',
            'model' => 'required|string',
            'edition' => 'nullable|string',
            'registered_year' => 'nullable|string',
            'registration_number' => 'required|string',
            'current_mileage' => 'nullable|integer',
            'color' => 'nullable|string',
            'remarks' => 'nullable|string',
        ], $request->all());

        // update the $vehicle
        $vehicle->update($validated);

        return response()->json($vehicle, 200);
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return response()->json(['message' => 'Vehicle details successfully trashed.'], 200);
    }

    public function show(Vehicle $vehicle)
    {
        return response()->json($vehicle, 200);
    }
}
