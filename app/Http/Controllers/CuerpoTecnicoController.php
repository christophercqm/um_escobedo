<?php

namespace App\Http\Controllers;

use App\Models\CuerpoTecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CuerpoTecnicoController extends Controller
{
    /**
     * Muestra una lista de los miembros del cuerpo técnico.
     */
    public function index()
    {
        // Obtener todos los miembros del cuerpo técnico
        $cuerpoTecnico = CuerpoTecnico::all();

        // Retornar la vista con los datos del cuerpo técnico
        return inertia('administration/CuerpoTecnico/Index', [
            'cuerpoTecnico' => $cuerpoTecnico,
        ]);
    }

    /**
     * Muestra el formulario para crear un nuevo miembro del cuerpo técnico.
     */
    public function create()
    {
        return inertia('administration/CuerpoTecnico/Create');
    }

    /**
     * Almacena un nuevo miembro del cuerpo técnico en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los campos requeridos
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'rol' => 'required|string|max:255',
            'estado' => 'required|string|in:Activo,Inactivo',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048', // imagen opcional
        ]);

        // Manejo de la carga de imagen, solo si se proporciona
        $imagePath = null;
        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('cuerpo_tecnicos', 'public'); // Almacenar la imagen en 'storage/app/public/cuerpo_tecnicos'
        }

        // Crear un nuevo miembro del cuerpo técnico en la base de datos
        CuerpoTecnico::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'rol' => $request->rol,
            'estado' => $request->estado,
            'foto' => $imagePath, // Guardar la ruta de la imagen, puede ser nula
        ]);

        // Redirigir al índice de cuerpo técnico con un mensaje de éxito
        return redirect()->route('cuerpo-tecnico.index')->with('success', 'Cuerpo técnico creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un miembro del cuerpo técnico.
     */
    public function edit($id)
    {
        // Obtener el miembro del cuerpo técnico por su ID
        $cuerpoTecnico = CuerpoTecnico::findOrFail($id);

        return inertia('CuerpoTecnico/Edit', [
            'cuerpoTecnico' => $cuerpoTecnico,
        ]);
    }

    /**
     * Actualiza la información de un miembro del cuerpo técnico en la base de datos.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'rol' => 'required|string|max:255',
            'estado' => 'required|string|in:Activo,Inactivo',
            'foto_url' => 'nullable|image|max:2048',
        ]);

        // Obtener el miembro del cuerpo técnico
        $cuerpoTecnico = CuerpoTecnico::findOrFail($id);

        // Manejar el archivo de la foto si se sube una nueva
        if ($request->hasFile('foto_url')) {
            // Eliminar la foto anterior si existe
            if ($cuerpoTecnico->foto_url) {
                Storage::disk('public')->delete($cuerpoTecnico->foto_url);
            }
            // Guardar la nueva foto
            $filePath = $request->file('foto_url')->store('cuerpo-tecnico', 'public');
            $validated['foto_url'] = $filePath;
        }

        // Actualizar el miembro del cuerpo técnico
        $cuerpoTecnico->update($validated);

        // Redireccionar a la lista con un mensaje de éxito
        return redirect()->route('cuerpo-tecnico.index')->with('success', 'Miembro del cuerpo técnico actualizado con éxito.');
    }

    /**
     * Elimina un miembro del cuerpo técnico de la base de datos.
     */
    public function destroy($id)
    {
        // Obtener el miembro del cuerpo técnico por su ID
        $cuerpoTecnico = CuerpoTecnico::findOrFail($id);

        // Eliminar la foto del almacenamiento si existe
        if ($cuerpoTecnico->foto_url) {
            Storage::disk('public')->delete($cuerpoTecnico->foto_url);
        }

        // Eliminar el miembro del cuerpo técnico
        $cuerpoTecnico->delete();

        // Redireccionar a la lista con un mensaje de éxito
        return redirect()->route('cuerpo-tecnico.index')->with('success', 'Miembro del cuerpo técnico eliminado con éxito.');
    }

    /**
     * Muestra los detalles de un miembro del cuerpo técnico.
     */
    public function show($id)
    {
        // Obtener el miembro del cuerpo técnico por su ID
        $cuerpoTecnico = CuerpoTecnico::findOrFail($id);

        // Retornar la vista con los detalles del miembro del cuerpo técnico
        return inertia('CuerpoTecnico/Show', [
            'cuerpoTecnico' => $cuerpoTecnico,
        ]);
    }
}
