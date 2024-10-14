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
        Log::info('Iniciando el procesamiento del formulario de patrocinador.', [
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent')
        ]);

        // Validar los datos del formulario
        try {
            $data = $request->validate([
                'empresa' => 'required|string|max:255',
                'nombreRepresentante' => 'required|string|max:255',
                'email' => 'required|email',
                'telefono' => 'nullable|string|max:15',
                'mensaje' => 'nullable|string',
                'privacidad' => 'accepted',
            ]);
            Log::info('Validación exitosa del formulario de patrocinador.', $data);
        } catch (\Exception $e) {
            Log::error('Error en la validación del formulario de patrocinador: ' . $e->getMessage(), [
                'request' => $request->all()
            ]);
            return redirect()->back()->withErrors(['error' => 'Datos del formulario no válidos.'])->withInput();
        }

        // Crear un nuevo registro en la base de datos
        try {
            FormularioPatrocinador::create([
                'empresa' => $data['empresa'],
                'nombre_representante' => $data['nombreRepresentante'],
                'email' => $data['email'],
                'telefono' => $data['telefono'],
                'mensaje' => $data['mensaje'],
                'privacidad_aceptada' => (int)$data['privacidad'],
            ]);
            Log::info('Formulario de patrocinador guardado en la base de datos con éxito.', $data);
        } catch (\Exception $e) {
            Log::error('Error al guardar en la base de datos: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'No se pudo procesar el formulario, por favor intente más tarde.']);
        }

        // Determinar el asunto del correo
        $asunto = "Nuevo mensaje de patrocinador: {$data['empresa']}";

        // Enviar el correo
        try {
            Log::info('Preparando el envío del correo con los datos: ', $data);
            Mail::to('recipient@example.com')
                ->send(new FormularioPatrocinadorMailable($data, $asunto));
            Log::info('Correo enviado con éxito a recipient@example.com');
        } catch (\Exception $e) {
            Log::error('Error al enviar el correo: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'No se pudo enviar el mensaje, por favor intente más tarde.']);
        }

        // Respuesta de éxito
        Log::info('Proceso de patrocinador completado con éxito.');
        return back()->with('success', 'Mensaje enviado correctamente');
    }
}
