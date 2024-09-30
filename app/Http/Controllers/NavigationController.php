<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Storage; 

use App\Models\Prensa;
use App\Models\Jugadores; 

class NavigationController extends Controller
{
    public function club()
    {
        return Inertia::render('Club');
    }

    public function primerEquipo()
    {
        $jugadores = Jugadores::all();
        return Inertia::render('Public/PrimerEquipo/Index', [
            'jugadores' => $jugadores, // Pasar los jugadores como prop
        ]);    }

    public function escuela()
    {
        return Inertia::render('Escuela');
    }

    public function prensa()
    {
        $prensas = Prensa::all(); // Obtiene todos los registros de Prensa
        return Inertia::render('Prensa/Index', [ // Renderiza la vista pública
            'prensa' => $prensas, // Pasa los datos a la vista
        ]);
    }

    public function contacto()
    {
        return Inertia::render('Contacto');
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
