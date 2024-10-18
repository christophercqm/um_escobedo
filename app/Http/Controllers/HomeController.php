<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\UltimoPartido;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener el próximo partido
        $proximoPartido = Partido::with(['equipoLocal', 'equipoVisitante'])
            ->where('fecha_hora', '>', now())
            ->orderBy('fecha_hora', 'asc')
            ->first();

        // Obtener los últimos partidos
        $ultimosPartidos = UltimoPartido::with(['partido.equipoLocal', 'partido.equipoVisitante'])->get();
        $ultimoPartido = $ultimosPartidos->isNotEmpty() ? $ultimosPartidos->last() : null;

        // Obtener los 6 próximos partidos
        $seisProximosPartidos = Partido::with(['equipoLocal', 'equipoVisitante'])
            ->where('fecha_hora', '>', now())
            ->orderBy('fecha_hora', 'asc')
            ->take(6) // Limitar a 6 partidos
            ->get();

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'proximoPartido' => $proximoPartido,
            'ultimoPartido' => $ultimoPartido,
            'todosPartidos' => $seisProximosPartidos, // Cambiar aquí para enviar solo 6 partidos
        ]);
    }
}
