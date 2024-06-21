<?php

namespace App\Providers;

use App\Events\AddedProject;
use App\Events\ChangeStatus;
use App\Events\MemberRemoved;
use App\Events\RoleChanged;
use App\Events\TicketAssigned;
use App\Listeners\SendAddProjectNotification;
use App\Listeners\SendChangeStatusNotification;
use App\Listeners\SendMemberRemovedNotification;
use App\Listeners\SendRoleChangedNotification;
use App\Listeners\SendTicketAssignedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AddedProject::class => [
            SendAddProjectNotification::class
        ],
        MemberRemoved::class => [
            SendMemberRemovedNotification::class
        ],
        RoleChanged::class => [
            SendRoleChangedNotification::class
        ],
        TicketAssigned::class => [
            SendTicketAssignedNotification::class
        ],
        ChangeStatus::class => [
            SendChangeStatusNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
