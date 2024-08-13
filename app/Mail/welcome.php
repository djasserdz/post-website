<?php
namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class welcome extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public User $user)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('gndjasser@gmail.com'), 
            subject: 'Welcome to Laravel',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $path = 'posts_images/R1FTDBmORuQGHeDbYkeIf0HHzKvUyqnEjLxg9HGY.png';
        
        // Debug to check if the file exists
        if (!Storage::disk('public')->exists($path)) {
            throw new \Exception("File does not exist: $path");
        }

        // Create the attachment from the storage disk
        $attachment = Attachment::fromStorageDisk('public', $path);

        // Check what the attachment returns
        if (!$attachment) {
            throw new \Exception("Failed to create attachment from file: $path");
        }

        return [
            $attachment
        ];
    }
}
