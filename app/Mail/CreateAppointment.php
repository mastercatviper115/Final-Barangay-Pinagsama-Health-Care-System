<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreateAppointment extends Mailable
{
    use Queueable, SerializesModels;

    public $approver_email;
    public $approver_name;
    public $user_name;
    public $user_email;
    public $type;
    public $date;
    public $subject;
    public $body;
    public $actiontext;
    public $actionurl;
    /**
     * Create a new message instance.
     */
    public function __construct($details)
    {
        $this->approver_email = $details['approver_email'];
        $this->approver_name = $details['approver_name'];
        $this->user_name = $details['user_name'];
        $this->user_email = $details['user_email'];
        $this->type = $details['type'];
        $this->date = $details['date'];
        $this->subject = $details['subject'];
        $this->body = $details['body'];
        $this->actiontext = $details['actiontext'];
        $this->actionurl = $details['actionurl'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'user.create-appointment-mail-template',
            with: [
                'approver_email' => $this->approver_email,
                'approver_name' => $this->approver_name,
                'user_name' => $this->user_name,
                'user_email' => $this->user_email,
                'type' => $this->type,
                'date' => $this->date,
                'body' => $this->body,
                'actiontext' => $this->actiontext,
                'actionurl' => $this->actionurl,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
