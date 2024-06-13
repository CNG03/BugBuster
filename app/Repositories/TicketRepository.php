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
}
