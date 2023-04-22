<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'vehicle_id' => $this->vehicle_id,
            'vehicle' => VehicleResource::make($this->vehicle),
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
