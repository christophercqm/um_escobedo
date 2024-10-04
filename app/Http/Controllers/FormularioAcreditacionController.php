<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acreditacion; // Asegúrate de que el modelo está importado
use App\Mail\FormularioAcreditacionMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;



class FormularioAcreditacionController extends Controller
{
    public function storeAcreditacion(Request $request)
    {
        // Validar los datos
        $request->validate([
            'tipo_acreditacion' => 'required|string',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'dni' => 'required|string',
            'correo' => 'required|email',
            'telefono' => 'required|string',
            'asunto' => 'required|string',
            'equipo_pertenece' => 'required|string',
            'archivo' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        // Crear y guardar la instancia del modelo
        $acreditacion = new Acreditacion();
        $acreditacion->tipo_acreditacion = $request->tipo_acreditacion;
        $acreditacion->nombre = $request->nombre;
        $acreditacion->apellido = $request->apellido;
        $acreditacion->dni = $request->dni;
        $acreditacion->correo = $request->correo;
        $acreditacion->telefono = $request->telefono;
        $acreditacion->asunto = $request->asunto;
        $acreditacion->equipo_pertenece = $request->equipo_pertenece;

        // Manejar el archivo si existe
        if ($request->hasFile('archivo')) {
            $filePath = $request->file('archivo')->store('acreditaciones', 'public');
            $acreditacion->archivo = $filePath;

            // Mapear tipo de acreditación a un formato más legible
            $tipoAcreditacionLegible = $this->mapTipoAcreditacion($request->tipo_acreditacion);

            // Crear un asunto personalizado
            $asunto = "Solicitud de Acreditación de {$request->nombre} {$request->apellido} ({$tipoAcreditacionLegible})";

            // Aquí puedes enviar el correo con el archivo adjunto
            try {
                Log::info('Enviando correo con los datos: ', $request->all()); // Log para depurar
                Mail::to($request->correo) // Cambia aquí para enviar al correo del usuario
                    ->send(new FormularioAcreditacionMailable($request->all(), $asunto, storage_path("app/public/$filePath")));
            } catch (\Exception $e) {
                Log::error('Error al enviar el correo: ' . $e->getMessage()); // Log de error
                return back()->withErrors(['error' => 'No se pudo enviar el mensaje, por favor intente más tarde.']);
            }
        }

        $acreditacion->save();

        // Redirigir o devolver una respuesta
        return redirect()->back()->with('success', 'Acreditación guardada correctamente.');
    }

    // Método para mapear el tipo de acreditación
    private function mapTipoAcreditacion($tipo)
    {
        $tiposLegibles = [
            'cuerpo_tecnico' => 'Cuerpo Técnico',
            'cuerpo_directivo' => 'Cuerpo Directivo',
            'arbitro' => 'Árbitro',
            'prensa' => 'Prensa',
            // Agrega más mapeos si es necesario
        ];

        return $tiposLegibles[$tipo] ?? $tipo; // Devuelve el tipo legible o el mismo si no se encuentra
    }
}
