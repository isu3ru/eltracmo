<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::all();
        return AppointmentResource::collection($appointments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i:s',
        ]);

        // check if there is an appointment for the date and time
        $appointment = Appointment::where('appointment_date', $validated['appointment_date'])
            ->where('appointment_time', $validated['appointment_time'])
            ->first();

        if ($appointment) {
            return response()->json(['message' => 'Time slot already reserved.'], 422);
        }

        // confirm the appointment if the confirmation mode is set to auto
        if (config('eltracmo.appointments.confirmation_mode') === 'auto') {
            $validated['confirmed_at'] = now();
        }

        $appointment = Appointment::create($validated);

        return response()->json($appointment, 201);
    }

    public function show(Appointment $appointment)
    {
        return response()->json(new AppointmentResource($appointment));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i:s',
        ]);

        // check if there is an appointment for the date and time
        $appointment = Appointment::where('appointment_date', $validated['appointment_date'])
            ->where('appointment_time', $validated['appointment_time'])
            ->first();

        if ($appointment) {
            return response()->json(['message' => 'Time slot already reserved.'], 422);
        }

        $appointment->update($validated);

        return $appointment;
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return response()->json(['message' => 'Appointment details successfully trashed.'], 200);
    }

    public function cancel(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'cancellation_remarks' => 'required',
        ]);

        $appointment->cancelled_at = now();
        $appointment->cancellation_remarks = $validated['cancellation_remarks'];
        $appointment->save();

        return response()->json(['message' => 'Appointment successfully cancelled.'], 200);
    }
}
