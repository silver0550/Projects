<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProjectHasChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(protected string $projectName, protected array $changed)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Project has changed',
            from: 'Test@testmail.com',
        );
    }

    public function content(): Content
    {
        return (new Content(
            view: 'mails.project_has_changed',
        ))->with([
            'projectName' => $this->projectName,
            'data' => $this->changed
        ]);
    }

    public function attachments(): array
    {
        return [];
    }
}
