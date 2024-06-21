<?php

namespace App\Listeners;

use App\Events\MemberRemoved;
use App\Mail\ProjectMemberRemovedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMemberRemovedNotification implements ShouldQueue
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
    public function handle(MemberRemoved $event): void
    {
        Mail::to($event->user->email)->send(new ProjectMemberRemovedNotification($event->user->name, $event->project->name));
    }
}
