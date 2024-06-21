<?php

namespace App\Listeners;

use App\Events\RoleChanged;
use App\Mail\RoleChangedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendRoleChangedNotification implements ShouldQueue
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
    public function handle(RoleChanged $event): void
    {
        Mail::to($event->user->email)->send(new RoleChangedNotification($event->user->name, $event->role, $event->project->name));
    }
}
