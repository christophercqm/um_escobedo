<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AcreditacionAprobada extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Datos de acreditación que pasaremos a la vista
    public $asunto; // Asunto del correo
    public $pdfPath; // Ruta del PDF

    /**
     * Create a new message instance.
     */
    public function __construct($data, $asunto = null, $pdfPath = null)
    {
        $this->data = $data; // Inicializamos los datos de acreditación
        $this->asunto = $asunto ?: "{$data['nombre']} {$data['apellido']} - Acreditación Aprobada"; 
        $this->pdfPath = $pdfPath; // Guardamos la ruta del PDF
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->asunto,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.acreditacion_aprobada', // Vista Markdown para el correo
            with: ['data' => $this->data], // Pasamos los datos a la vista
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        // Verificamos si la ruta del PDF está presente y es válida
        if ($this->pdfPath && file_exists($this->pdfPath)) {
            $attachments[] = \Illuminate\Mail\Mailables\Attachment::fromPath($this->pdfPath);
        }

        return $attachments;
    }
}
