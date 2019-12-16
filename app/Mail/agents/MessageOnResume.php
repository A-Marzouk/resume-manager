<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 12/15/2019
 * Time: 8:31 PM
 */

namespace App\Mail\agents;

use App\Agent;
use App\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageOnResume extends Mailable
{
    use Queueable, SerializesModels;

    public $agent;
    public $form_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form_data, Agent $agent)
    {
        $this->form_data = $form_data;
        $this->agent  = $agent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $recipients = config('mail.recipients');
        return $this
            ->to($this->agent->user->email)
            ->cc($recipients)
            ->replyTo(config('mail.from.address'), 'noreply')
            ->subject('Message on your resume!')
            ->view('emails.message_on_resume');
    }
}
