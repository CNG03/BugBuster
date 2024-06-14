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

    public function getUserTickets($userId, $pageSize = 10)
    {
        return Ticket::where('created_by', $userId)
            ->with(['histories' => function ($query) {
                $query->latest()->first();
            }])
            ->paginate($pageSize);
    }

    public function getAssignedTickets($userId, $pageSize = 10)
    {
        return Ticket::where('assigned_to', $userId)
            ->with(['histories' => function ($query) {
                $query->latest()->first();
            }])
            ->paginate($pageSize);
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $ticket = Ticket::create($data);

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
            $query->latest('created_at');
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