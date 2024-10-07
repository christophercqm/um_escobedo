<?php
namespace App\Http\Controllers;

use App\Mail\FormularioPatrocinadorMailable;
use App\Models\FormularioPatrocinador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class FormularioPatrocinadorController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $data = $request->validate([
            'empresa' => 'required|string|max:255',
            'nombreRepresentante' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'nullable|string|max:15',
            'mensaje' => 'nullable|string',
            'privacidad' => 'accepted',
        ]);

        // Crear un nuevo registro en la base de datos
        FormularioPatrocinador::create([
            'empresa' => $data['empresa'],
            'nombre_representante' => $data['nombreRepresentante'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'mensaje' => $data['mensaje'],
            'privacidad_aceptada' => (int)$data['privacidad'],
        ]);

        // Determinar el asunto del correo
        $asunto = "Nuevo mensaje de patrocinador: {$data['empresa']}";

        // Enviar el correo
        try {
            Log::info('Enviando correo con los datos: ', $data);
            Mail::to('recipient@example.com')
                ->send(new FormularioPatrocinadorMailable($data, $asunto));
        } catch (\Exception $e) {
            Log::error('Error al enviar el correo: ' . $e->getMessage()); // Log de error
            return redirect()->back()->withErrors(['error' => 'No se pudo enviar el mensaje, por favor intente más tarde.']);
        }

        // Respuesta de éxito
        return back()->with('success', 'Mensaje enviado correctamente');

    }
}
