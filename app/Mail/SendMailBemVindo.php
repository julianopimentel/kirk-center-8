<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailBemVindo extends Mailable
{
    use Queueable, SerializesModels;

    protected $conta_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $conta_name)
    {
        //
        $this->conta_name = $conta_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $conta_name = $this->conta_name;
        return $this->view('emails.Bem-Vindo', compact('conta_name'));
    }
}
