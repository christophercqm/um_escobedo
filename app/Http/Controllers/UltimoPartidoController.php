<?php

namespace App\Http\Controllers;

use App\Models\UltimoPartido;
use App\Models\Partido;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

class UltimoPartidoController extends Controller
{

    public function index()
    {
        // Obtener todos los últimos partidos con sus equipos
        $ultimosPartidos = UltimoPartido::with(['partido.equipoLocal', 'partido.equipoVisitante'])->get();

        if ($ultimosPartidos->isEmpty()) {
            Log::info('No hay últimos partidos disponibles para mostrar.');
            return Inertia::render('administration/UltimosPartidos/Index', [
                'ultimosPartidos' => [],
                'message' => 'No hay últimos partidos disponibles.'
            ]);
        }

        // Renderizar la vista con los últimos partidos
        return Inertia::render('administration/UltimosPartidos/Index', [
            'ultimosPartidos' => $ultimosPartidos,
        ]);
    }


    public function create()
    {
        // Obtener todos los partidos
        $partidos = Partido::with(['equipoLocal', 'equipoVisitante'])->get();

        Log::info('Se están obteniendo partidos para crear un nuevo registro.');

        return Inertia::render('administration/UltimosPartidos/Create', [
            'partidos' => $partidos, // Pasar la lista de partidos como prop
        ]);
    }

    public function store(Request $request)
    {
        // Registrar la entrada del método
        Log::info('Intentando crear un nuevo último partido.', $request->all());

        // Validar los datos recibidos
        $validatedData = $request->validate([
            'partido_id' => 'required|exists:partidos,id',  // Asegúrate de que el partido exista
            'puntuacion_local' => 'nullable|integer',
            'puntuacion_visitante' => 'nullable|integer',
            'estadio' => 'nullable|string',
            'estado_partido' => 'nullable|string',
        ]);

        // Registrar los datos validados
        Log::info('Datos validados para el último partido:', $validatedData);

        // Crear el último partido en la tabla ultimos_partidos
        $ultimoPartido = UltimoPartido::create($validatedData);

        // Verificar si se creó correctamente
        if ($ultimoPartido) {
            Log::info('Último partido creado exitosamente.', ['partido_id' => $ultimoPartido->id]);
            return redirect()->back()->with('success', 'Último partido creado exitosamente.');
        } else {
            Log::error('Error al crear el último partido.');
            return redirect()->back()->with('error', 'Error al crear el último partido.');
        }
    }

    public function edit($id)
    {
        // Obtener el último partido y sus relaciones
        $ultimoPartido = UltimoPartido::with('partido.equipoLocal', 'partido.equipoVisitante')->findOrFail($id);
        $partidos = Partido::with(['equipoLocal', 'equipoVisitante'])->get();

        Log::info('Accediendo al formulario de edición para el último partido con ID: ' . $id);

        return Inertia::render('administration/UltimosPartidos/Edit', [
            'ultimoPartido' => $ultimoPartido,
            'partidos' => $partidos, // Pasar la lista de partidos como prop
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'puntuacion_local' => 'nullable|string|max:10',
            'puntuacion_visitante' => 'nullable|string|max:10',
            'estadio' => 'nullable|string|max:255',
            'estado_partido' => 'nullable|string|max:255',
            'partido_id' => 'required|exists:partidos,id',
        ]);

        // Actualizar el registro del último partido
        $ultimoPartido = UltimoPartido::findOrFail($id);
        $ultimoPartido->update($validatedData);

        Log::info('Último partido actualizado exitosamente.', ['partido_id' => $id, 'datos' => $validatedData]);

        return redirect()->route('admin.ultimos_partidos')->with('success', 'Último partido actualizado con éxito.');
    }

    public function destroy($id)
    {
        // Buscar y eliminar el último partido
        $ultimoPartido = UltimoPartido::findOrFail($id);
        $ultimoPartido->delete();

        Log::info('Último partido eliminado exitosamente.', ['partido_id' => $id]);

        return redirect()->route('admin.ultimos_partidos')->with('success', 'Último partido eliminado con éxito.');
    }

    public function show($id)
    {
        // Obtener el último partido y sus relaciones
        $ultimoPartido = UltimoPartido::with('partido.equipoLocal', 'partido.equipoVisitante')->findOrFail($id);

        Log::info('Accediendo a los detalles del último partido con ID: ' . $id);

        return Inertia::render('administration/UltimosPartidos/Show', [
            'ultimoPartido' => $ultimoPartido,
        ]);
    }
}
