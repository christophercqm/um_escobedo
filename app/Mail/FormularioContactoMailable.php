<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormularioContactoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $data;


    /**
     * Create a new message instance.
     *
     * @param $usuario
     * @param $message
     */
    public function __construct($data, $message)
    {
        $this->data = $data;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('emails.contacto')
            ->subject('Contacto'); // Using the app name in the subject
    }
}
