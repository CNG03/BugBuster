<?php

namespace App\Mail;

use App\Models\Project;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class ChangeStatusNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $project;

    public $ticket;

    public $status;

    public function __construct(User $user, Project $project, Ticket $ticket, $status)
    {
        $this->user = $user;
        $this->project = $project;
        $this->ticket = $ticket;
        $this->status = $status;
    }

    public function build()
    {
        return $this->subject('Ticket status Changed')
            ->view('mail.change_status_notification')
            ->with([
                'user' => $this->user,
                'project' => $this->project,
                'ticket' => $this->ticket,
                'status' => $this->status
            ]);
    }
};
