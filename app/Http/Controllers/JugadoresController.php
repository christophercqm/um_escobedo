<?php

namespace App\Http\Controllers;

use App\Models\Jugadores;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JugadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $jugadores = Jugadores::all(); // Obtener todos los jugadores
        return Inertia::render('administration/Jugadores/Index', [
            'jugadores' => $jugadores, // Pasar los jugadores como prop
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
    public function show(Jugadores $jugadores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jugadores $jugadores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jugadores $jugadores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jugadores $jugadores)
    {
        //
    }
}
