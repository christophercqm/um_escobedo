<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormularioAcreditacionMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $asunto;
    public $archivoPath;
    
    /**
     * Create a new message instance.
     *
     * @param array $data
     * @param string $asunto
     * @param string|null $archivoPath

     */
    public function __construct($data, $asunto, $archivoPath = null)
    {
        $this->data = $data;
        $this->asunto  = $asunto;
        $this->archivoPath = $archivoPath; // Guardamos la ruta del archivo PDF
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->from(config('mail.from.address'), 'Escobedo')
                      ->markdown('emails.acreditacion')
                      ->subject($this->asunto)
                      ->with('data', $this->data);

        // Si hay un archivo, lo adjuntamos
        if ($this->archivoPath) {
            $email->attach($this->archivoPath);
        }

        return $email;
    }
}
