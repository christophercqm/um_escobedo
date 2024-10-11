<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los partidos de la base de datos
        $partidos = Partido::with(['equipoLocal', 'equipoVisitante'])->get();
        $equipos = Equipo::all(); 


        return inertia('Public/Contacto/Index', [
            'partidos' => $partidos,
            'equipos' => $equipos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}
}
