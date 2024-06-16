<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->histories->first()->status,
            'history' => $this->histories,
            'created_by' => $this->createdUser ? $this->createdUser->name : $this->created_by,
            'assigned_to' => $this->assignedUser ? $this->assignedUser->name : $this->assigned_to,
            'estimated_hours' => $this->estimated_hours,
            'is_outdate' => $this->is_outdate,
            'steps_to_reproduce' => $this->steps_to_reproduce,
            'expected_result' => $this->expected_result,
            'actual_result' => $this->actual_result,
            'priority' => $this->priority,
            'bug_type' => $this->bugType ? $this->bugType->name : null,
            'test_type' => $this->testType ? $this->testType->name : null,
            'illustration' => $this->illustration ? $this->illustration : null
        ];
    }
}
