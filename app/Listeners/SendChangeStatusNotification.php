<?php

namespace App\Listeners;

use App\Events\ChangeStatus;
use App\Mail\ChangeStatusNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendChangeStatusNotification implements ShouldQueue
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
    public function handle(ChangeStatus $event): void
    {
        Mail::to($event->user->email)->send(new ChangeStatusNotification($event->user, $event->project, $event->ticket, $event->status));
    }
}
