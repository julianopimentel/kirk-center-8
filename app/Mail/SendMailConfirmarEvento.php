<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailConfirmarEvento extends Mailable
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
        $this->subject('Evento confirmado - '. $conta_name);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.Confirmar_Evento');
    }
}
