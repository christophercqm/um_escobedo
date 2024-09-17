<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class NavigationController extends Controller
{
    public function club()
    {
        return Inertia::render('Club');
    }

    public function primerEquipo()
    {
        return Inertia::render('PrimerEquipo');
    }

    public function escuela()
    {
        return Inertia::render('Escuela');
    }

    public function prensa()
    {
        return Inertia::render('Prensa');
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
