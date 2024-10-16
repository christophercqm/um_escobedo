<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\CuerpoTecnico;
use App\Models\Partido;
use App\Models\Jugadores;


class PrimerEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuerpoTecnico = CuerpoTecnico::all();
        $jugadores = Jugadores::all(); // Asegúrate de incluir la colección de jugadores
        $proximoPartido = Partido::with(['equipoLocal', 'equipoVisitante'])
            ->where('fecha_hora', '>', now()) // Fecha mayor a la actual
            ->orderBy('fecha_hora', 'asc')    // Ordenar por fecha más cercana
            ->first();

        return Inertia::render('Public/PrimerEquipo/Index', [
            'cuerpoTecnico' => $cuerpoTecnico,
            'jugadores' => $jugadores, // Agrega esta línea
            'proximoPartido' => $proximoPartido,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
