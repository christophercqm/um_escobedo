<?php

namespace App\Http\Controllers;

use App\Models\Partido; // Asegúrate de importar tu modelo
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProximosPartidosController extends Controller
{
    public function index()
    {
        // Obtener todos los partidos que aún no han ocurrido
        $partidos = Partido::with(['equipoLocal', 'equipoVisitante'])
            ->where('fecha_hora', '>', now()) // Fecha mayor a la actual
            ->orderBy('fecha_hora', 'asc')    // Ordenar por fecha más cercana
            ->get();                           // Obtener todos los resultados

        return Inertia::render('Public/ProximosPartidos/Index', [
            'partidos' => $partidos,
        ]);
    }
}
