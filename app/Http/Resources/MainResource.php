<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MainResource extends JsonResource
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
            'position_id' => $this->position_id,
            'person_id' => $this->person_id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'type' => $this->type,
            'created_at' => ($this->created_at)
        ];
    }
}
