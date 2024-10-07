<?php
namespace App\Http\Controllers;

use App\Mail\FormularioContactoMailable;
use App\Models\FormularioContacto; // Importar el modelo correcto
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class FormularioContactarController extends Controller
{
    public function store(Request $request)
    {
        // Validar el formulario de contacto
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'nullable|string|max:255',
            'email' => 'required|email',
            'telefono' => 'nullable|string|max:15',
            'mensaje' => 'nullable|string',
            'privacidad' => 'accepted', // Verificar que la casilla de privacidad fue marcada
        ]);

        // Crear una nueva entrada en la base de datos usando el modelo correcto
        FormularioContacto::create([
            'tipo' => 'contactar', // Asignar el tipo por defecto como 'contactar'
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'mensaje' => $data['mensaje'],
            'privacidad_aceptada' => (int)$data['privacidad'], // Almacenar como 1 o 0
        ]);

        // Determinar el asunto del correo
        $asunto = "{$data['nombre']} {$data['apellidos']} - Correo General de Contacto";

        // Enviar el correo
        try {
            Log::info('Enviando correo con los datos: ', $data);
            Mail::to('recipient@example.com') // Reemplaza con la dirección de correo del destinatario
                ->send(new FormularioContactoMailable($data, $asunto));
        } catch (\Exception $e) {
            Log::error('Error al enviar el correo: ' . $e->getMessage());
            return back()->withErrors(['error' => 'No se pudo enviar el mensaje, por favor intente más tarde.']);
        }

        // Respuesta de éxito al cliente
        return back()->with('success', 'Mensaje enviado correctamente');
    }
}
