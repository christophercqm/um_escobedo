<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormularioContactoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $asunto;

    /**
     * Create a new message instance.
     *
     * @param array $data  Los datos del formulario
     * @param string $asunto  El asunto del correo
     */
    public function __construct($data, $asunto)
    {
        $this->data = $data;
        $this->asunto = $asunto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->asunto)
            ->markdown('emails.formularioContactar')
            ->with('data', $this->data);
    }
}
