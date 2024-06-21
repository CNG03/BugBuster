<?php

namespace App\Listeners;

use App\Events\AddedProject;
use App\Mail\AddedProjectNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAddProjectNotification implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public $tries = 5;
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AddedProject $event): void
    {
        Mail::to($event->user->email)->send(new AddedProjectNotification($event->user->name, $event->project->name));
    }
}
