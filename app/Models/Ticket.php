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
        if (!empty($value)) {
            $this->attributes['estimated_hours'] = Carbon::createFromFormat('Y-m-d', $value)->startOfDay();
            $this->attributes['is_outdate'] = $this->isOutdate();
        } else {
            $this->attributes['estimated_hours'] = null;
            $this->attributes['is_outdate'] = false;
        }
    }

    public function isOutdate()
    {
        if ($this->estimated_hours && $this->estimated_hours->isPast()) {
            return true;
        }
        return false;
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function bugType()
    {
        return $this->belongsTo(BugType::class, 'bug_type_id');
    }

    public function testType()
    {
        return $this->belongsTo(TestType::class, 'test_type_id');
    }

    public function histories()
    {
        return $this->hasMany(TicketHistory::class, 'ticket_id');
    }
}