<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::all();
        return Inertia::render('administration/Equipos/Index', [
            'equipos' => $equipos,
        ]);
    }

    public function create()
    {
        return Inertia::render('administration/Equipos/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'ciudad' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
        ]);

        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;

        // Manejar el archivo de logo
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('equipos', 'public'); // Guardar el logo en la carpeta public/logos
            $equipo->logo = $path;
        }

        $equipo->ciudad = $request->ciudad;
        $equipo->pais = $request->pais;
        $equipo->save();

        return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente.');
    }

    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        return Inertia::render('administration/Equipos/Edit', [
            'equipo' => $equipo,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'ciudad' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
        ]);

        // Encontrar el equipo por ID
        $equipo = Equipo::findOrFail($id);
        $equipo->nombre = $request->nombre;
        $equipo->ciudad = $request->ciudad;
        $equipo->pais = $request->pais;

        // Manejar el archivo de logo
        if ($request->hasFile('logo')) {
            // Eliminar el logo anterior si existe
            if ($equipo->logo) {
                Storage::disk('public')->delete($equipo->logo);
            }
            // Guardar el nuevo logo
            $path = $request->file('logo')->store('equipos', 'public');
            $equipo->logo = $path;
        }

        // Guardar los cambios en la base de datos
        $equipo->save();

        // Redirigir o devolver una respuesta
        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado correctamente.');
    }




    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();

        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente.');
    }
}
