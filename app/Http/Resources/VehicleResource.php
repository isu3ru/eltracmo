<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'customer_id' => $this->customer_id,
            'title' => $this->title,
            'make' => $this->make,
            'model' => $this->model,
            'edition' => $this->edition,
            'registered_year' => $this->registered_year,
            'registration_number' => $this->registration_number,
            'current_mileage' => $this->current_mileage,
            'color' => $this->color,
            'remarks' => $this->remarks,
            'customer' => CustomerResource::make($this->customer),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
