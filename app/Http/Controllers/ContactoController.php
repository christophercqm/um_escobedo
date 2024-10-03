<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormularioContactoMailable;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Public/Contacto/Index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar el tipo de formulario
        $data = $request->validate([
            'tipo' => 'required|in:contactar,acreditacion,patrocinadores',
            'nombre' => 'required_if:tipo,contactar|string|max:255',
            'apellidos' => 'nullable|string|max:255',
            'email' => 'required|email',
            'telefono' => 'nullable|string|max:15',
            'mensaje' => 'nullable|string',
            'empresa' => 'required_if:tipo,patrocinadores|string|max:255',
            'nombreRepresentante' => 'required_if:tipo,patrocinadores|string|max:255',
            'asunto' => 'required_if:tipo,patrocinadores|string|max:255',
            'privacidad' => 'accepted', // Verificar que la casilla de privacidad fue marcada
        ]);

        // Crear una nueva entrada en la base de datos
        $contacto = new Contacto();
        $contacto->tipo = $data['tipo'];
        // Usar el nombre del representante si el formulario es de patrocinadores
        $contacto->nombre = $data['tipo'] === 'patrocinadores' ? $data['nombreRepresentante'] : $data['nombre'];
        $contacto->apellidos = $data['apellidos'] ?? null;
        $contacto->email = $data['email'];
        $contacto->telefono = $data['telefono'] ?? null;
        // Usar el mensaje para el formulario de patrocinadores
        $contacto->mensaje = $data['tipo'] === 'patrocinadores' ? $data['asunto'] : $data['mensaje'];
        $contacto->privacidad_aceptada = $data['privacidad'] ? 1 : 0;
        $contacto->save();

        // Determinar el asunto según el tipo de formulario
        $asunto = match ($data['tipo']) {
            'contactar' => "{$data['nombre']} {$data['apellidos']} - Correo General de Contacto",
            'patrocinadores' => "{$data['empresa']} - Correo Patrocinadores",
            'acreditacion' => "Correo Acreditación",
            default => 'Correo General de Contacto'
        };

        // Enviar el correo
        try {
            \Log::info('Enviando correo con los datos: ', $data); // Agregar log para depurar
            Mail::to('recipient@example.com')
                ->send(new FormularioContactoMailable($data, $asunto));
        } catch (\Exception $e) {
            \Log::error('Error al enviar el correo: ' . $e->getMessage()); // Log de error
            return back()->withErrors(['error' => 'No se pudo enviar el mensaje, por favor intente más tarde.']);
        }

        // Enviar respuesta de éxito al cliente (Vue.js)
        return back()->with('success', 'Mensaje enviado correctamente');
    }




    /**
     * Obtiene las reglas de validación según el tipo de formulario.
     */
}
