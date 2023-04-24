<?php

namespace App\Http\Controllers;

use App\Enums\JobStatus;
use App\Http\Resources\JobResource;
use App\Models\Appointment;
use App\Models\Job;
use App\Traits\SmsNotifiable;
use Illuminate\Http\Request;

class JobController extends Controller
{
    use SmsNotifiable;

    public function allJobs()
    {
        $jobs = Job::all();
        return JobResource::collection($jobs);
    }

    public function getJobDetails(Job $job)
    {
        return response()->json(new JobResource($job));
    }

    public function create(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'type' => 'required|in:service,repair',
            'status' => 'required|in:pending,ongoing,completed',
            'remarks' => 'nullable|string',
        ]);

        $job = Job::create([
            'appointment_id' => $appointment->id,
            'type' => $validated['type'],
            'status' => JobStatus::ONGOING->value,
            'remarks' => $validated['remarks'],
        ]);

        // get customer
        $user = $job->appointment->vehicle->customer->user;
        // send HTTP request.
        $this->sendSms($user->mobile_number, "You have an active job in Savimal Auto Center.\nYour job for appointment at " . $job->appointment->appointment_date . ' ' . $job->appointment->appointment_time . " has been started.\nPlease await for more updates.");

        return response()->json(new JobResource($job), 201);
    }

    public function updateStatus(Request $request, Job $job)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,ongoing,completed',
        ]);

        $job->update($validated);

        // add jobstatus entry
        $job->jobStatuses()->create([
            'status' => $validated['status'],
        ]);

        return response()->json(new JobResource($job));
    }

    public function getStatusesForJob(Job $job)
    {
        return response()->json($job->jobStatuses);
    }

    public function getRunningJobs()
    {
        $jobs = Job::where('status', 'ongoing')->get();
        return JobResource::collection($jobs);
    }
}
