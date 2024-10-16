<?php

namespace App\Http\Controllers;

use App\Models\Prensa; // Asegúrate de incluir el modelo
use App\Models\Partido;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session; // Asegúrate de incluir esto
use Illuminate\Support\Facades\Log;


class PrensaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prensas = Prensa::all(); // Obtiene todos los registros de Prensa
        return Inertia::render('administration/Prensa/Index', [
            'prensa' => $prensas,
        ]);
    }

    public function publicIndex()
    {
        $prensas = Prensa::all(); // Obtiene todos los registros de Prensa
        $proximoPartido = Partido::with(['equipoLocal', 'equipoVisitante']) // Asegúrate de incluir las relaciones
            ->where('fecha_hora', '>', now()) // Fecha mayor a la actual
            ->orderBy('fecha_hora', 'asc')    // Ordenar por fecha más cercana
            ->first();                        // Obtener el primer resultado

        return Inertia::render('Public/Prensa/Index', [
            'prensa' => $prensas,
            'proximoPartido' => $proximoPartido,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('administration/Prensa/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        // Validar los datos recibidos
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion_breve' => 'required|string',
            'descripcion' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'estado' => 'required|integer',
            'categoria' => 'required|string',
        ]);

        // Manejo de la carga de imagen
        $imagePath = $request->file('imagen')->store('prensa', 'public');

        // Crear un nuevo registro en la base de datos
        Prensa::create([
            'titulo' => $request->titulo,
            'descripcion_breve' => $request->descripcion_breve,
            'descripcion' => $request->descripcion,
            'imagen' => $imagePath,
            'estado' => $request->estado,
            'categoria' => $request->categoria,
        ]);

        return redirect()->route('admin.prensa');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prensas = Prensa::findOrFail($id); // Busca la Noticia por el ID
        return Inertia::render('administration/Prensa/Show', [
            'prensa' => $prensas,
        ]);
    }

    public function showPublic(string $id)
    {
        $prensa = Prensa::findOrFail($id); // Busca la Prensa por ID
        $allPrensa = Prensa::all(); // Obtiene todos los registros de Prensa para el sidebar
        return Inertia::render('Public/Prensa/ShowPublic', [ // Asegúrate de que el path sea correcto
            'prensa' => $prensa,
            'allPrensa' => $allPrensa, // Pasa todos los artículos a la vista
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $articulo = Prensa::findOrFail($id); // Busca la Prensa por ID

        return Inertia::render('administration/Prensa/Edit', [
            'articulo' => $articulo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos recibidos
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion_breve' => 'required|string',
            'descripcion' => 'required|string',
            'estado' => 'required|boolean',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048', // 'nullable' para permitir que no se suba una nueva imagen
            'categoria' => 'required|string',
        ]);

        // Buscar la Prensa por ID
        $prensa = Prensa::findOrFail($id);

        // Manejo de la carga de imagen si se proporciona una nueva imagen
        if ($request->hasFile('imagen')) {
            // Elimina la imagen anterior si existe
            if ($prensa->imagen) {
                File::delete(public_path('storage/' . $prensa->imagen));
            }
            // Almacena la nueva imagen
            $imagePath = $request->file('imagen')->store('prensa', 'public');
            $prensa->imagen = $imagePath; // Actualiza la ruta de la imagen
        }

        // Actualiza el registro con el resto de los campos
        $prensa->update([
            'titulo' => $request->titulo,
            'descripcion_breve' => $request->descripcion_breve,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'categoria' => $request->categoria,
            'imagen' => $prensa->imagen // Asegúrate de que se incluya la imagen actualizada o la existente
        ]);

        // Redirige con un mensaje de éxito
        return redirect()->route('admin.prensa')->with('success', 'Prensa actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prensa = Prensa::findOrFail($id); // Busca la Prensa por ID
        // Elimina la imagen del almacenamiento si existe
        if ($prensa->imagen) {
            File::delete(public_path('storage/' . $prensa->imagen));
        }
        $prensa->delete(); // Elimina el registro

        return redirect()->route('admin.prensa')
            ->with('success', 'Artículo eliminado con éxito.');
    }
}
