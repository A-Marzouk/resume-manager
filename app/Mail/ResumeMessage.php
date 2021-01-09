<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResumeMessage extends Mailable
{
    use Queueable, SerializesModels;
    public $emailData;
    public $from;

    /**
     * Create a new message instance.
     * @param $emailData
     * @param $from
     * @return void
     */
    public function __construct($emailData, $from)
    {
        $this->emailData = $emailData ;
        $this->from = $from ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject( 'New message on resume | 123workforce.com' )
            ->from('info@123workforce.com')
            ->markdown('emails.client.resume_message');
    }
}
