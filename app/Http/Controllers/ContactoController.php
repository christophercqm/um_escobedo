<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormularioContactoMailable;
use Inertia\Inertia;

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
            'nombre' => 'required|string|max:255',
            'apellidos' => 'nullable|string|max:255',
            'email' => 'required|email',
            'telefono' => 'nullable|string|max:15',
            'mensaje' => 'nullable|string',
            'privacidad' => 'accepted', // Verificar que la casilla de privacidad fue marcada
        ]);

        // Crear una nueva entrada en la base de datos
        $contacto = new Contacto();
        $contacto->tipo = $data['tipo'];
        $contacto->nombre = $data['nombre'];
        $contacto->apellidos = $data['apellidos'];
        $contacto->email = $data['email'];
        $contacto->telefono = $data['telefono'];
        $contacto->mensaje = $data['mensaje'];
        $contacto->privacidad_aceptada = $data['privacidad'] ? 1 : 0; // Convertir a 1 o 0
        $contacto->save();

        // Determinar el asunto según el tipo de formulario
        $asunto = 'Correo General de Contacto';

        // Enviar el correo
        try {
            Mail::to('recipient@example.com')
                ->send(new FormularioContactoMailable($data, $asunto));
        } catch (\Exception $e) {
            error_log('Error al enviar el correo: ' . $e->getMessage());
            return back()->withErrors(['error' => 'No se pudo enviar el mensaje, por favor intente más tarde.']);
        }

        // Enviar respuesta de éxito al cliente (Vue.js)
        return back()->with('success', 'Mensaje enviado correctamente');
    }


    /**
     * Obtiene las reglas de validación según el tipo de formulario.
     */
}
