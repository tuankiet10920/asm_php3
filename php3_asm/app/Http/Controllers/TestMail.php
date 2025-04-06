<?php

namespace App\Mails; // Change to the Mail namespace

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details; // Make it public to access in the view

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        return $this->subject('Test Email from Laravel')
                    ->view('emails.emails'); // Use 'emails.emails' view
    }
}
