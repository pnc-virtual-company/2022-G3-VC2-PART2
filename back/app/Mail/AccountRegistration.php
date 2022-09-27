<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountRegistration extends Mailable
{
    use Queueable, SerializesModels;

    private $data = null;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('seyhasoeurn007@gmail.com', 'PNC Alumni Association')
        ->subject('Registration request from ' . $this->data['email'])
        ->view('emails.AccountRegistration')->with('data', $this->data);
    }
}
