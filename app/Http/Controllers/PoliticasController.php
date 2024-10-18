<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliticasController extends Controller
{
    public function privacidad()
    {
        // Retorna la vista de la política de privacidad
        return inertia('Public/Politicas/Privacidad'); // Ajusta la vista según tu estructura
    }

    public function cookies()
    {
        // Retorna la vista de la política de cookies
        return view('politicas.cookies'); // Asegúrate de que esta vista existe
    }
}
