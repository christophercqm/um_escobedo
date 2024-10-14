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
        Log::info('Iniciando el procesamiento del formulario de contacto.', ['ip' => $request->ip(), 'user_agent' => $request->header('User-Agent')]);

        // Validar el formulario de contacto
        try {
            $data = $request->validate([
                'nombre' => 'required|string|max:255',
                'apellidos' => 'nullable|string|max:255',
                'email' => 'required|email',
                'telefono' => 'nullable|string|max:15',
                'mensaje' => 'nullable|string',
                'privacidad' => 'accepted', // Verificar que la casilla de privacidad fue marcada
            ]);
            Log::info('Validación exitosa del formulario de contacto.', $data);
        } catch (\Exception $e) {
            Log::error('Error en la validación del formulario de contacto: ' . $e->getMessage(), ['request' => $request->all()]);
            return back()->withErrors(['error' => 'Datos del formulario no válidos.'])->withInput();
        }

        // Crear una nueva entrada en la base de datos usando el modelo correcto
        try {
            FormularioContacto::create([
                'tipo' => 'contactar', // Asignar el tipo por defecto como 'contactar'
                'nombre' => $data['nombre'],
                'apellidos' => $data['apellidos'],
                'email' => $data['email'],
                'telefono' => $data['telefono'],
                'mensaje' => $data['mensaje'],
                'privacidad_aceptada' => (int)$data['privacidad'], // Almacenar como 1 o 0
            ]);
            Log::info('Formulario de contacto guardado en la base de datos con éxito.', $data);
        } catch (\Exception $e) {
            Log::error('Error al guardar en la base de datos: ' . $e->getMessage());
            return back()->withErrors(['error' => 'No se pudo procesar el formulario, por favor intente más tarde.']);
        }

        // Determinar el asunto del correo
        $asunto = "{$data['nombre']} {$data['apellidos']} - Correo General de Contacto";

        // Enviar el correo
        try {
            Log::info('Preparando el envío del correo con los datos: ', $data);
            Mail::to('recipient@example.com') // Reemplaza con la dirección de correo del destinatario
                ->send(new FormularioContactoMailable($data, $asunto));
            Log::info('Correo enviado con éxito a recipient@example.com');
        } catch (\Exception $e) {
            Log::error('Error al enviar el correo: ' . $e->getMessage());
            return back()->withErrors(['error' => 'No se pudo enviar el mensaje, por favor intente más tarde.']);
        }

        // Respuesta de éxito al cliente
        Log::info('Proceso de contacto completado con éxito.');
        return back()->with('success', 'Mensaje enviado correctamente');
    }
}
