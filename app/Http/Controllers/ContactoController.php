<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormularioContactoMailable;
use Inertia\Inertia;
use App\Models\Acreditacion;
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
    {}








    /**
     * Obtiene las reglas de validación según el tipo de formulario.
     */
}
