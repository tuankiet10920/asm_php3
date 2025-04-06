<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
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
        $this->subject('Test Email from Laravel')->view('emails.emails', [
            'localBrand' => 'NTK Market of Anna Buildings',
            'email' => $this->details['email']
        ]);
        return response()->json('successfully!');
    }



}
