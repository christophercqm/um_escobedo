<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acreditacion;
use App\Mail\FormularioAcreditacionMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


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
            'proximo_encuentro' => 'required|string',
            'partido_id' => 'required|exists:partidos,id',
            'archivo' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        // Crear y guardar la instancia del modelo
        $acreditacion = Acreditacion::create($validatedData);

        // Manejar el archivo si existe
        $filePath = null; // Inicializar la variable
        if ($request->hasFile('archivo')) {
            $filePath = $request->file('archivo')->store('acreditaciones', 'public');
            $acreditacion->archivo = $filePath;
            $acreditacion->save(); // Guarda la ruta del archivo en la base de datos
        }

        // Cargar el partido relacionado
        $partido = $acreditacion->partido; // Aquí cargamos el partido relacionado

        // Mapear tipo de acreditación a un formato más legible
        $tipoAcreditacionLegible = $this->mapTipoAcreditacion($request->tipo_acreditacion);

        // Formatear la fecha y hora del partido
        $fechaHoraFormateada = Carbon::parse($partido->fecha_hora)->format('d/m/Y H:i'); // Ajusta el formato aquí

        // Crear un asunto personalizado
        $asunto = "Solicitud de Acreditación de {$validatedData['nombre']} {$validatedData['apellido']} ({$tipoAcreditacionLegible})";

        // Preparar los datos para el correo
        $data = [
            'nombre' => $validatedData['nombre'],
            'apellido' => $validatedData['apellido'],
            'dni' => $validatedData['dni'],
            'correo' => $validatedData['correo'],
            'telefono' => $validatedData['telefono'],
            'tipo_acreditacion' => $tipoAcreditacionLegible, // Cambiado a formato legible
            'proximo_encuentro' => $validatedData['proximo_encuentro'],
            'asunto' => $validatedData['asunto'],
            'fecha_hora' => $fechaHoraFormateada, // Usamos la fecha formateada
        ];

        // Enviar el correo con el archivo adjunto
        try {
            Log::info('Enviando correo con los datos: ', $data); // Log para depurar
            $attachment = $filePath ? storage_path("app/public/$filePath") : null; // Archivo adjunto o null

            // Envío del correo
            Mail::to($validatedData['correo'])
                ->send(new FormularioAcreditacionMailable($data, $asunto, $attachment));

            Log::info('Correo enviado correctamente a: ' . $validatedData['correo']);
        } catch (\Exception $e) {
            Log::error('Error al enviar el correo: ' . $e->getMessage()); // Log de error
            return redirect()->back()->withErrors(['error' => 'No se pudo enviar el mensaje, por favor intente más tarde.']);
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
        ];

        return $tiposLegibles[$tipo] ?? $tipo; // Devuelve el tipo legible o el mismo si no se encuentra
    }
}
