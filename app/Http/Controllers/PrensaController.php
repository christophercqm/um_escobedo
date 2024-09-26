<?php

namespace App\Http\Controllers;

use App\Models\Prensa; // Asegúrate de incluir el modelo
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session; // Asegúrate de incluir esto

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('administration/Prensa/Create'); // Muestra el formulario de creación
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion_breve' => 'required|string',
            'descripcion' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Manejo de la carga de imagen
        if ($request->hasFile('imagen')) {
            // Obtener el archivo de la imagen
            $file = $request->file('imagen');

            // Almacenar la imagen usando el disco público
            $imagePath = $file->store('prensa', 'public');

            // Crear un nuevo registro en la base de datos
            $prensa = Prensa::create([
                'titulo' => $request->titulo,
                'descripcion_breve' => $request->descripcion_breve,
                'descripcion' => $request->descripcion,
                'imagen' => $imagePath, // Guardar la ruta en la base de datos
            ]);

            // Comprobar si el registro se creó
            if ($prensa) {
                return redirect()->route('admin.prensa')->with('success', 'Artículo creado con éxito.');
            } else {
                return back()->withErrors(['error' => 'No se pudo crear el artículo.']);
            }
        } else {
            return back()->withErrors(['error' => 'No se ha subido ninguna imagen.']);
        }
    }







    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prensa = Prensa::findOrFail($id); // Busca la Prensa por ID
        return Inertia::render('administration/Prensa/Show', [
            'prensa' => $prensa,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prensa = Prensa::findOrFail($id); // Busca la Prensa por ID
        return Inertia::render('administration/Prensa/Edit', [
            'prensa' => $prensa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
        ]);

        $prensa = Prensa::findOrFail($id); // Busca la Prensa por ID
        $prensa->update($request->all()); // Actualiza el registro

        return redirect()->route('prensa.index')->with('success', 'Prensa actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prensa = Prensa::findOrFail($id); // Busca la Prensa por ID
        $prensa->delete(); // Elimina el registro

        return redirect()->route('admin.prensa')
            ->with('success', 'Artículo eliminado con éxito.');
    }
}
