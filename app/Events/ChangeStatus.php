<?php

namespace App\Events;

use App\Models\Project;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChangeStatus
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public $project;

    public $ticket;

    public $status;
    /**
     * Create a new event instance.
     */

    public function __construct(User $user, Project $project, Ticket $ticket, $status)
    {
        $this->user = $user;
        $this->project = $project;
        $this->ticket = $ticket;
        $this->status = $status;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
