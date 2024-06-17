<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class RoleChangedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user_name;

    public $role_name;

    public $project_name;

    public function __construct($user_name, $role_name, $project_name)
    {
        $this->role_name = $role_name;
        $this->user_name = $user_name;
        $this->project_name = $project_name;
    }

    public function build()
    {
        return $this->subject('Role Changed Notification')
            ->view('mail.role_changed_notification')
            ->with([
                'userName' => $this->user_name,
                'roleName' => $this->role_name,
                'projectName' => $this->project_name,
            ]);
    }
};
