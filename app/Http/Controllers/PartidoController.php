<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;


class PartidoController extends Controller
{
    // Listar todos los partidos

    public function index()
    {
        $partidos = Partido::with(['equipoLocal', 'equipoVisitante'])->get();

        return inertia('administration/Partidos/Index', [
            'partidos' => $partidos,
        ]);
    }



    public function proximoPartido()
    {
        // Obtener el próximo partido que aún no ha ocurrido
        $proximoPartido = Partido::with(['equipoLocal', 'equipoVisitante'])
            ->where('fecha_hora', '>', now()) // Fecha mayor a la actual
            ->orderBy('fecha_hora', 'asc')    // Ordenar por fecha más cercana
            ->first();                        // Obtener el primer resultado

        return inertia('Public/Prensa/Index', [
            'proximoPartido' => $proximoPartido,
        ]);
    }




    // Mostrar el formulario para crear un nuevo partido
    public function create()
    {
        $equipos = Equipo::all(); // Obtener todos los equipos
        return Inertia::render('administration/Partidos/Create', [
            'equipos' => $equipos,
        ]);
    }

    // Almacenar un nuevo partido
    public function store(Request $request)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id',
            'fecha_hora' => 'required|date',
            'resultado_local' => 'nullable|integer',
            'resultado_visitante' => 'nullable|integer',
            'estado' => 'required|string',
        ]);

        // Crear el partido
        Partido::create($request->all());

        return redirect()->route('partidos.index')->with('success', 'Partido creado con éxito.');
    }

    // Mostrar el formulario para editar un partido existente
    public function edit($id)
    {
        $partido = Partido::with(['equipoLocal', 'equipoVisitante'])->findOrFail($id);
        $equipos = Equipo::all(); // Obtener todos los equipos
        return Inertia::render('administration/Partidos/Edit', [
            'partido' => $partido,
            'equipos' => $equipos,
        ]);
    }

    // Actualizar un partido existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id',
            'fecha_hora' => 'required|date',
            'resultado_local' => 'nullable|integer',
            'resultado_visitante' => 'nullable|integer',
            'estado' => 'required|string',
        ]);

        $partido = Partido::findOrFail($id);
        $partido->update($request->all());

        return redirect()->route('partidos.index')->with('success', 'Partido actualizado con éxito.');
    }

    // Eliminar un partido
    public function destroy($id)
    {
        $partido = Partido::findOrFail($id);
        $partido->delete();

        return redirect()->route('partidos.index')->with('success', 'Partido eliminado con éxito.');
    }
}
