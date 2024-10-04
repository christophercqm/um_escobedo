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
        $validatedData = $request->validate([
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
        $acreditacion = Acreditacion::create($validatedData);

        // Manejar el archivo si existe
        if ($request->hasFile('archivo')) {
            $filePath = $request->file('archivo')->store('acreditaciones', 'public');
            $acreditacion->archivo = $filePath;
            $acreditacion->save(); // Guarda la ruta del archivo en la base de datos

            // Mapear tipo de acreditación a un formato más legible
            $tipoAcreditacionLegible = $this->mapTipoAcreditacion($request->tipo_acreditacion);

            // Crear un asunto personalizado
            $asunto = "Solicitud de Acreditación de {$validatedData['nombre']} {$validatedData['apellido']} ({$tipoAcreditacionLegible})";

            // Enviar el correo con el archivo adjunto
            try {
                Log::info('Enviando correo con los datos: ', $validatedData); // Log para depurar
                Mail::to($validatedData['correo']) // Cambia aquí para enviar al correo del usuario
                    ->send(new FormularioAcreditacionMailable($validatedData, $asunto, storage_path("app/public/$filePath")));
            } catch (\Exception $e) {
                Log::error('Error al enviar el correo: ' . $e->getMessage()); // Log de error
                return redirect()->back()->withErrors(['error' => 'No se pudo enviar el mensaje, por favor intente más tarde.']);
            }
        }

        // Redirigir al usuario con un mensaje de éxito
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
