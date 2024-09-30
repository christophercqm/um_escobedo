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
