<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RechazoAcreditacionMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emails.rechazo_acreditacion')
                    ->subject('Solicitud de Acreditación Rechazada')
                    ->with(['data' => $this->data]);
    }
}
