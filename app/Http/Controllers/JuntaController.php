<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\File;
use App\Models\Junta;
use App\Models\Prensa;
use Illuminate\Support\Facades\Log;


class JuntaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los miembros de la tabla junta
        $miembros = Junta::all();


        return Inertia::render('administration/Junta/Index', [
            'miembros' => $miembros,
        ]);
    }

    /**
     * Display a listing of the members for public view.
     */
    public function publicIndex()
    {
        // Obtener todos los miembros de la tabla junta
        $miembros = Junta::all();

        // Obtener las últimas 3 noticias de prensa
        $prensa = Prensa::where('estado', 1)->inRandomOrder()->take(3)->get()->toArray(); // 'estado' 1 significa activo


        // Renderiza la vista pública
        return Inertia::render('Public/Club/Index', [
            'miembros' => $miembros,
            'prensa' => $prensa

        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('administration/Junta/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar solo los campos que son obligatorios
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'foto_url' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048', // imagen obligatoria
            'estado' => 'required|string|in:Activo,Inactivo',
        ]);

        // Manejo de la carga de imagen
        $imagePath = $request->file('foto_url')->store('junta', 'public'); // Almacenar la imagen en 'storage/app/public/junta'

        // Crear un nuevo miembro de la junta en la base de datos
        $junta = Junta::create([
            'nombre' => $request->nombre,
            'cargo' => $request->cargo,
            'foto_url' => $imagePath, // Guardar la ruta de la imagen
            'estado' => $request->estado,
        ]);

        // Redirigir al índice de la junta con un mensaje de éxito
        return redirect()->route('admin.junta.index')->with('success', 'Miembro de la junta creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Busca el miembro de la junta por su ID
        $junta = Junta::find($id);

        // Verifica si el miembro de la junta existe
        if (!$junta) {
            return redirect()->route('admin.junta')->with('error', 'Miembro de la junta no encontrado');
        }

        // Retorna la vista con los datos del miembro
        return Inertia::render('administration/Junta/Edit', [
            'junta' => $junta, // Pasa el objeto miembro
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscar el miembro de la junta por ID
        $junta = Junta::findOrFail($id);

        // Validar los campos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'foto_url' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048', // imagen opcional
            'estado' => 'required|string|in:Activo,Inactivo',
        ]);

        // Si se proporciona una nueva imagen, manejar la carga de imagen
        if ($request->hasFile('foto_url')) {
            // Eliminar la imagen anterior si existe
            if ($junta->foto_url) {
                File::delete(public_path('storage/' . $junta->foto_url));
            }

            // Almacenar la nueva imagen
            $imagePath = $request->file('foto_url')->store('junta', 'public');
            $junta->foto_url = $imagePath; // Actualizar la ruta de la imagen
        }

        // Actualizar los datos del miembro de la junta
        $junta->update([
            'nombre' => $request->nombre,
            'cargo' => $request->cargo,
            'estado' => $request->estado,
        ]);

        // Redirigir al índice de la junta con un mensaje de éxito
        return redirect()->route('admin.junta')->with('success', 'Miembro de la junta actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Busca el miembro de la junta por ID
            $junta = Junta::findOrFail($id);

            // Elimina la imagen del almacenamiento si existe
            if ($junta->foto_url) {
                File::delete(public_path('storage/' . $junta->foto_url));
            }

            // Elimina el registro del miembro de la junta
            $junta->delete();

            // Redirige a la lista de la junta con un mensaje de éxito
            return redirect()->route('admin.junta.index')->with('success', 'Miembro de la junta eliminado con éxito.');
        } catch (\Exception $e) {
            // Registra el error en el log
            Log::error('Error al eliminar el miembro de la junta: ' . $e->getMessage(), [
                'id' => $id,
                'stack' => $e->getTraceAsString(),
            ]);

            // Redirige a la lista de la junta con un mensaje de error
            return redirect()->route('admin.junta.index')->with('error', 'Error al eliminar el miembro de la junta. Por favor, intenta de nuevo más tarde.');
        }
    }
}
