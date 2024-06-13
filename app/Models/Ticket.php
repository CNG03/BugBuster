<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id', 'name', 'description', 'created_by', 'assigned_to', 'estimated_hours',
        'is_outdate', 'steps_to_reproduce', 'expected_result', 'actual_result',
        'priority', 'bug_type_id', 'test_type_id'
    ];

    protected $dates = ['estimated_hours'];

    public function setEstimatedHoursAttribute($value)
    {
        $this->attributes['estimated_hours'] = Carbon::createFromFormat('Y-m-d', $value);
    }

    public function getEstimatedHoursAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function bugType()
    {
        return $this->belongsTo(BugType::class);
    }

    public function testType()
    {
        return $this->belongsTo(TestType::class);
    }

    public function histories()
    {
        return $this->hasMany(TicketHistory::class, 'ticket_id');
    }
}
