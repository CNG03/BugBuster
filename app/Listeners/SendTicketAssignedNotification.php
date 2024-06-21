<?php

namespace App\Listeners;

use App\Events\TicketAssigned;
use App\Mail\TicketAssignedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendTicketAssignedNotification implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public $tries = 5;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TicketAssigned $event): void
    {
        Mail::to($event->user->email)->send(new TicketAssignedNotification($event->user->name, $event->project->name, $event->ticket));
    }
}
