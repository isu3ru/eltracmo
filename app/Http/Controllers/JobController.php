<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Models\Appointment;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
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
            'status' => $validated['status'],
            'remarks' => $validated['remarks'],
        ]);

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
}
