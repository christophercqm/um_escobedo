<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormularioPatrocinadorMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $asunto;

    public function __construct($data, $asunto)
    {
        $this->data = $data;
        $this->asunto = $asunto;
    }

    public function build()
    {
        return $this->subject($this->asunto)
                    ->markdown('emails.formularioPatrocinador')
                    ->with('data', $this->data);
    }
}
