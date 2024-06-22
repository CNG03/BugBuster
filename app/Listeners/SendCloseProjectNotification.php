<?php

namespace App\Listeners;

use App\Events\CloseProject;
use App\Mail\CloseProjectNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendCloseProjectNotification implements ShouldQueue
{
    use InteractsWithQueue;
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
    public function handle(CloseProject $event): void
    {
        Mail::to($event->user->email)->send(new CloseProjectNotification($event->user->name, $event->project->name));
    }
}
