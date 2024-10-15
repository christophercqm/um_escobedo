<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\File;
use App\Models\Jugadores;

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
        return Inertia::render('administration/Jugadores/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar solo los campos que son obligatorios
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'posicion' => 'required|string|max:255',
            'numero_camiseta' => 'required|integer',
            'estado' => 'required|string|in:Activo,Inactivo',
            'foto_url' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048', // imagen obligatoria
            'fecha_nacimiento' => 'nullable|date',
            'altura' => 'nullable|numeric',
            'peso' => 'nullable|numeric',
            'equipo' => 'nullable|string|max:255',
            'nacionalidad' => 'nullable|string|max:255',
        ]);

        // Manejo de la carga de imagen
        $imagePath = $request->file('foto_url')->store('jugadores', 'public'); // Almacenar la imagen en 'storage/app/public/jugadores'

        // Crear un nuevo jugador en la base de datos, con solo los campos obligatorios
        $jugador = Jugadores::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'posicion' => $request->posicion,
            'numero_camiseta' => $request->numero_camiseta,
            'estado' => $request->estado,
            'foto_url' => $imagePath, // Guardar la ruta de la imagen
        ]);

        // Ahora, si se proporcionaron los campos opcionales, actualízalos
        $jugador->update([
            'fecha_nacimiento' => $request->input('fecha_nacimiento'), // Opcional
            'altura' => $request->input('altura'), // Opcional
            'peso' => $request->input('peso'), // Opcional
            'equipo' => $request->input('equipo'), // Opcional
            'nacionalidad' => $request->input('nacionalidad'), // Opcional
        ]);

        // Redirigir al índice de jugadores con un mensaje de éxito
        return redirect()->route('admin.jugadores')->with('success', 'Jugador creado exitosamente.');
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
    public function edit($id)
    {
        // Busca el jugador por su ID
        $jugador = Jugadores::find($id);

        // Verifica si el jugador existe
        if (!$jugador) {
            return redirect()->route('admin.jugadores')->with('error', 'Jugador no encontrado');
        }

        // Retorna la vista con los datos del jugador
        return Inertia::render('administration/Jugadores/Edit', [
            'jugador' => $jugador, // Pasa el objeto jugador
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscar el jugador por ID
        $jugador = Jugadores::findOrFail($id);

        // Validar los campos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'posicion' => 'required|string|max:255',
            'numero_camiseta' => 'required|integer',
            'estado' => 'required|string|in:Activo,Inactivo',
            'foto_url' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048', // imagen opcional
            'fecha_nacimiento' => 'nullable|date',
            'altura' => 'nullable|numeric',
            'peso' => 'nullable|numeric',
            'equipo' => 'nullable|string|max:255',
            'nacionalidad' => 'nullable|string|max:255',
        ]);

        // Si se proporciona una nueva imagen, manejar la carga de imagen
        if ($request->hasFile('foto_url')) {
            // Eliminar la imagen anterior si existe
            if ($jugador->foto_url) {
                File::delete(public_path('storage/' . $jugador->foto_url));
            }

            // Almacenar la nueva imagen
            $imagePath = $request->file('foto_url')->store('jugadores', 'public');
            $jugador->foto_url = $imagePath; // Actualizar la ruta de la imagen
        }

        // Actualizar los datos del jugador
        $jugador->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'posicion' => $request->posicion,
            'numero_camiseta' => $request->numero_camiseta,
            'estado' => $request->estado,
            'fecha_nacimiento' => $request->input('fecha_nacimiento'), // Opcional
            'altura' => $request->input('altura'), // Opcional
            'peso' => $request->input('peso'), // Opcional
            'equipo' => $request->input('equipo'), // Opcional
            'nacionalidad' => $request->input('nacionalidad'), // Opcional
        ]);

        // Redirigir al índice de jugadores con un mensaje de éxito
        return redirect()->route('admin.jugadores')->with('success', 'Jugador actualizado exitosamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Busca el jugador por ID
        $jugador = Jugadores::findOrFail($id);

        // Elimina la imagen del almacenamiento si existe
        if ($jugador->foto_url) {
            File::delete(public_path('storage/' . $jugador->foto_url));
        }

        // Elimina el registro del jugador
        $jugador->delete();

        // Redirige a la lista de jugadores con un mensaje de éxito
        return redirect()->route('admin.jugadores')
            ->with('success', 'Jugador eliminado con éxito.');
    }
}
