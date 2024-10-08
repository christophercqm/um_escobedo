<?php

namespace App\Http\Controllers;

use App\Models\Partido; // Asegúrate de que el modelo Partido está importado
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

        return inertia('Public/Contacto/Index', [
            'partidos' => $partidos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}
}
