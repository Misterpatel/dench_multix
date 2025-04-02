<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    protected $fromEmail;
    protected $fromName;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data, string $fromEmail, string $fromName)
    {
        $this->data = $data;
        $this->fromEmail = $fromEmail;
        $this->fromName = $fromName;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from($this->fromEmail, $this->fromName)
                    ->subject('Password Reset Mail')
                    ->view('pages.email.password_reset_link')
                    ->with($this->data);
    }
}