<?php

namespace App\Repositories;

use App\Models\ProjectMember;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\AddedProjectNotification;
use App\Mail\RoleChangedNotification;
use App\Models\Ticket;
use App\Models\TicketHistory;

class TicketRepository
{
    public function getProjectTickets()
    {
    }

    public function getUserTickets($userId, $projectId, $pageSize = 10)
    {
        return Ticket::where('created_by', $userId)
            ->where('project_id', $projectId)
            ->with(['histories' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])
            ->paginate($pageSize);
    }

    public function getAssignedTickets($userId, $projectId, $pageSize = 10)
    {
        return Ticket::where('assigned_to', $userId)
            ->where('project_id', $projectId)
            ->with(['histories' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])
            ->paginate($pageSize);
    }

    public function create($user_id, array $data)
    {

        return DB::transaction(function () use ($user_id, $data) {
            $ticket = Ticket::create([
                'project_id' => $data['project_id'],
                'name' => $data['name'],
                'description' => data_get($data, 'description'),
                'created_by' => $user_id,
                'assigned_to' => $data['assigned_to'],
                'estimated_hours' => data_get($data, 'estimated_hours'),
                'steps_to_reproduce' => data_get($data, 'steps_to_reproduce'),
                'expected_result' => data_get($data, 'expected_result'),
                'actual_result' => data_get($data, 'actual_result'),
                'priority' => $data['priority'],
                'bug_type_id' => $data['bug_type_id'],
                'test_type_id' => $data['test_type_id']
            ]);

            TicketHistory::create([
                'ticket_id' => $ticket->id,
                'status' => 'Error'
            ]);

            return $ticket;
        });
    }

    public function show(Ticket $ticket)
    {
        return $ticket->load(['histories' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);
    }

    public function update(Ticket $ticket, array $data)
    {
        DB::transaction(function () use ($ticket, $data) {
            $ticket->update([
                'name' => data_get($data, 'name'),
                'description' => data_get($data, 'description'),
                'test_type_id' => data_get($data, 'test_type_id', $ticket->test_type_id),
                'bug_type_id' => data_get($data, 'bug_type_id', $ticket->bug_type_id),
                'estimated_hours' => data_get($data, 'estimated_hours', $ticket->estimated_hours),
                'steps_to_reproduce' => data_get($data, 'steps_to_reproduce', $ticket->steps_to_reproduce),
                'expected_result' => data_get($data, 'expected_result', $ticket->expected_result),
                'actual_result' => data_get($data, 'actual_result', $ticket->actual_result),
                'priority' => data_get($data, 'priority', $ticket->priority),
            ]);

            TicketHistory::create([
                'ticket_id' => $ticket->id,
                'status' => data_get($data, 'status', 'Error')
            ]);
        });
    }
}
