<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class ProjectMemberRemovedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user_name;

    public $project_name;

    public function __construct($user_name, $project_name)
    {
        $this->project_name = $project_name;
        $this->user_name = $user_name;
    }

    public function build()
    {
        return $this->subject('Project Member Removed')
            ->view('mail.project_member_removed_notification')
            ->with([
                'userName' => $this->user_name,
                'projectName' => $this->project_name
            ]);
    }
};
