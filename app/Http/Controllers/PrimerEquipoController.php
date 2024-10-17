<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\CuerpoTecnico;
use App\Models\Partido;
use App\Models\Jugadores;
use App\Models\UltimoPartido; // Agrega esta línea



class PrimerEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuerpoTecnico = CuerpoTecnico::all();
        $jugadores = Jugadores::all();
        
        // Obtiene el próximo partido
        $proximoPartido = Partido::with(['equipoLocal', 'equipoVisitante'])
            ->where('fecha_hora', '>', now())
            ->orderBy('fecha_hora', 'asc')
            ->first();

        // Obtiene los últimos partidos
        $ultimosPartidos = UltimoPartido::with(['partido.equipoLocal', 'partido.equipoVisitante'])->get();

        // Verifica si hay últimos partidos y selecciona el último
        $ultimoPartido = $ultimosPartidos->last(); // O el método que prefieras para obtener el último
        $fechaHoraUltimoPartido = $ultimoPartido ? $ultimoPartido->partido->fecha_hora : null;


        return Inertia::render('Public/PrimerEquipo/Index', [
            'cuerpoTecnico' => $cuerpoTecnico,
            'jugadores' => $jugadores,
            'proximoPartido' => $proximoPartido,
            'ultimoPartido' => $ultimoPartido,
            'fechaHoraUltimoPartido' => $fechaHoraUltimoPartido, // Pasa la fecha y hora

 
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
