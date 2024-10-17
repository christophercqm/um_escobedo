<?php

namespace App\Http\Controllers;

use App\Models\UltimoPartido;
use App\Models\Equipo;
use App\Models\Partido;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UltimoPartidoController extends Controller
{
    public function index()
    {
        // Obtener todos los partidos con equipos locales y visitantes
        $partidos = Partido::with(['equipoLocal', 'equipoVisitante'])->get();

        if ($partidos->isEmpty()) {
            return Inertia::render('administration/UltimosPartidos/Index', [
                'message' => 'No hay partidos disponibles.'
            ]);
        }

        // Renderizar la vista y pasar los partidos como prop
        return Inertia::render('administration/UltimosPartidos/Index', [
            'partidos' => $partidos // Pasar los partidos como prop
        ]);
    }




    public function create()
    {
        // Obtener todos los equipos
        $equipos = Equipo::all();
        // Obtener todos los partidos para seleccionar uno
        $partidos = Partido::with(['equipoLocal', 'equipoVisitante'])->get();

        // Depuración: muestra los equipos y partidos obtenidos

        // Si no estás depurando, este sería el retorno normal
        return Inertia::render('administration/UltimosPartidos/Create', [
            'equipos' => $equipos, // Pasar la lista de equipos como prop
            'partidos' => $partidos, // Pasar la lista de partidos como prop
        ]);
    }

    public function store(Request $request)
    {
        // Validación y guardado del nuevo partido
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'puntuacion_local' => 'nullable|string|max:10',
            'puntuacion_visitante' => 'nullable|string|max:10',
            'estadio' => 'nullable|string',
            'estado_partido' => 'nullable|string',
            'resultado' => 'nullable|string',
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id',
            'partido_id' => 'required|exists:partidos,id', // Validar el partido_id
        ]);

        // Crear el nuevo registro
        UltimoPartido::create($validatedData);

        // Redirigir con mensaje de éxito
        return redirect()->route('admin.ultimos_partidos')->with('success', 'Partido creado con éxito.');
    }

    public function edit($id)
    {
        // Obtener el partido y sus equipos relacionados
        $partido = UltimoPartido::with(['equipoLocal', 'equipoVisitante', 'partido'])->findOrFail($id);
        // Obtener todos los equipos y partidos para el formulario de edición
        $equipos = Equipo::all();
        $partidos = Partido::all();

        return Inertia::render('administration/UltimosPartidos/Edit', [
            'partido' => $partido, // Pasar el partido como prop
            'equipos' => $equipos, // Pasar la lista de equipos como prop
            'partidos' => $partidos, // Pasar la lista de partidos como prop
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validación y actualización del partido
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'puntuacion_local' => 'nullable|string|max:10',
            'puntuacion_visitante' => 'nullable|string|max:10',
            'estadio' => 'nullable|string',
            'estado_partido' => 'nullable|string',
            'resultado' => 'nullable|string',
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id',
            'partido_id' => 'required|exists:partidos,id', // Validar el partido_id
        ]);

        // Actualizar el registro del partido
        $partido = UltimoPartido::findOrFail($id);
        $partido->update($validatedData);

        // Redirigir con mensaje de éxito
        return redirect()->route('admin.ultimos_partidos')->with('success', 'Partido actualizado con éxito.');
    }

    public function destroy($id)
    {
        // Buscar y eliminar el partido
        $partido = UltimoPartido::findOrFail($id);
        $partido->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('admin.ultimos_partidos')->with('success', 'Partido eliminado con éxito.');
    }

    public function show($id)
    {
        // Obtener el partido y sus equipos relacionados
        $partido = UltimoPartido::with(['equipoLocal', 'equipoVisitante', 'partido'])->findOrFail($id);

        return Inertia::render('administration/UltimosPartidos/Show', [
            'partido' => $partido, // Pasar el partido como prop
        ]);
    }
}
