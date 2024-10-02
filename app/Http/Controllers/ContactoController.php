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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'nullable|string|max:255',
            'email' => 'required|email',
            'telefono' => 'nullable|string|max:15',
            'mensaje' => 'required|string',
            'privacidad' => 'accepted', // Verificar que la casilla de privacidad fue marcada
        ]);
        $email = $data['email'];
        $message = 'Has recibido un nuevo mensaje de contacto';
        // Procesar los datos, por ejemplo, enviar un correo o guardarlos en la base de datos
        //$this->responseEmail($email, $message);
        Mail::to($data['email'])->send(new FormularioContactoMailable($data, $message));
        // Enviar respuesta de éxito al cliente (Vue.js)
        return back()->with('success', 'Mensaje enviado correctamente');
    }

    private function responseEmail($email, $message)
    {
        try {
            Mail::to($email)->send(new FormularioContactoMailable($email, $message));
            return true;
        } catch (\Exception $e) {
            error_log('Error al enviar email de credenciales: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contacto $contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contacto $contacto)
    {
        //
    }
}
