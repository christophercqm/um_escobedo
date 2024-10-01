<?php

namespace App\Http\Controllers;

use App\Models\CuerpoTecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


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

        // Si la imagen existe, concatenamos el prefijo 'storage/'
        if ($cuerpoTecnico->foto) {
            $cuerpoTecnico->foto = asset('storage/' . $cuerpoTecnico->foto);
        }

        return inertia('administration/CuerpoTecnico/Edit', [
            'cuerpoTecnico' => $cuerpoTecnico,
        ]);
    }

    /**
     * Actualiza la información de un miembro del cuerpo técnico en la base de datos.
     */


    public function update(Request $request, $id)
    {
        try {
            // Buscar el Cuerpo Técnico
            $cuerpoTecnico = CuerpoTecnico::findOrFail($id);

            // Validar los datos solo para los campos que se van a actualizar
            $validatedData = $request->validate([
                'nombres' => 'nullable|string|max:255',
                'apellidos' => 'nullable|string|max:255',
                'rol' => 'nullable|string|max:255',
                'estado' => 'nullable|string', // Permitir que estado sea opcional
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Actualizar solo los campos que están presentes en la solicitud
            $cuerpoTecnico->fill(array_filter($validatedData));

            // Manejar la carga de la foto si se ha proporcionado una nueva
            if ($request->hasFile('foto')) {
                // Eliminar la foto anterior si existe
                if ($cuerpoTecnico->foto) {
                    Storage::disk('public')->delete($cuerpoTecnico->foto);
                }
                $path = $request->file('foto')->store('cuerpo_tecnicos', 'public');
                $cuerpoTecnico->foto = $path; // Actualiza la ruta de la foto en el modelo
            }

            $cuerpoTecnico->save(); // Guarda los cambios

            // Redirigir a la vista de edición con un mensaje de éxito
            return redirect()->route('cuerpo-tecnico.index', $cuerpoTecnico->id)
                ->with('success', 'Cuerpo técnico actualizado exitosamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Registrar los errores de validación
            Log::error('Error de validación al actualizar Cuerpo Técnico: ', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput(); // Devuelve a la vista anterior con errores
        } catch (\Exception $e) {
            // Registrar cualquier otro error
            Log::error('Error al actualizar Cuerpo Técnico: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error inesperado.'); // Redirigir con un mensaje de error
        }
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
        return inertia('administration/CuerpoTecnico/Show', [
            'cuerpoTecnico' => $cuerpoTecnico,
        ]);
    }
}
