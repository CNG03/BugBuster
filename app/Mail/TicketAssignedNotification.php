<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class TicketAssignedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user_name;

    public $project_name;

    public $ticket;

    public function __construct($user_name, $project_name, Ticket $ticket)
    {
        $this->project_name = $project_name;
        $this->user_name = $user_name;
        $this->ticket = $ticket;
    }

    public function build()
    {
        return $this->subject('New ticket assigned')
            ->view('mail.ticket_assigned_notification')
            ->with([
                'user_name' => $this->user_name,
                'project_name' => $this->project_name,
                'ticket' => $this->ticket
            ]);
    }
};
