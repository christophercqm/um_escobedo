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
        ]);

        try {
            // Manejo de la carga de imagen
            $imagePath = $request->file('imagen')->store('prensa', 'public');

            // Crear un nuevo registro en la base de datos
            Prensa::create([
                'titulo' => $request->titulo,
                'descripcion_breve' => $request->descripcion_breve,
                'descripcion' => $request->descripcion,
                'imagen' => $imagePath, // Guardar la ruta en la base de datos
            ]);

            // Redirigir con éxito
            return redirect()->route('admin.prensa')->with('success', 'Artículo creado con éxito.');
        } catch (\Exception $e) {
            // En caso de que algo falle, redirigir con el error
            return redirect()->back()->withErrors(['error' => 'Ocurrió un error al crear el artículo.']);
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
