<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

use App\Models\Prensa;
use App\Models\Jugadores;
use App\Models\CuerpoTecnico;

class NavigationController extends Controller
{

    public function primerEquipo()
    {
        $jugadores = Jugadores::all();
        $cuerpoTecnico = CuerpoTecnico::all();
        return Inertia::render('Public/PrimerEquipo/Index', [
            'jugadores' => $jugadores,
            'cuerpoTecnico' => $cuerpoTecnico
        ]);
    }

    public function escuela()
    {
        return Inertia::render('Escuela');
    }


    // Métodos futuros para secciones administrativas
    public function adminDashboard()
    {
        return Inertia::render('Admin/Dashboard');
    }

    public function adminSettings()
    {
        return Inertia::render('Admin/Settings');
    }
}
