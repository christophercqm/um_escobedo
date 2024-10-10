<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acreditacion;
use App\Mail\FormularioAcreditacionMailable;
use App\Mail\RechazoAcreditacionMailable;
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
        $acreditacion = Acreditacion::create($validatedData + ['estado' => false]); // Inicializa estado como false (rechazada)

        // Manejar el archivo si existe
        if ($request->hasFile('archivo')) {
            $filePath = $request->file('archivo')->store('acreditaciones', 'public');
            $acreditacion->archivo = $filePath;
            $acreditacion->save(); // Guarda la ruta del archivo en la base de datos
        }

        // Cargar el partido relacionado
        $partido = $acreditacion->partido;

        // Mapear tipo de acreditación a un formato más legible
        $tipoAcreditacionLegible = $this->mapTipoAcreditacion($request->tipo_acreditacion);

        // Formatear la fecha y hora del partido
        $fechaHoraFormateada = Carbon::parse($partido->fecha_hora)->format('d/m/Y H:i');

        // Preparar los datos para el correo
        $data = [
            'nombre' => $validatedData['nombre'],
            'apellido' => $validatedData['apellido'],
            'dni' => $validatedData['dni'],
            'correo' => $validatedData['correo'],
            'telefono' => $validatedData['telefono'],
            'tipo_acreditacion' => $tipoAcreditacionLegible,
            'proximo_encuentro' => $validatedData['proximo_encuentro'],
            'fecha_hora' => $fechaHoraFormateada,
            'acreditacion_id' => $acreditacion->id,
        ];

        // Enviar el correo
        try {
            Log::info('Enviando correo con los datos: ', $data);
            $attachment = $acreditacion->archivo ? storage_path("app/public/{$acreditacion->archivo}") : null;

            Mail::to($validatedData['correo'])
                ->send(new FormularioAcreditacionMailable($data, "Solicitud de Acreditación de {$validatedData['nombre']} {$validatedData['apellido']}", $attachment));

            Log::info('Correo enviado correctamente a: ' . $validatedData['correo']);
        } catch (\Exception $e) {
            Log::error('Error al enviar el correo: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'No se pudo enviar el mensaje, por favor intente más tarde.']);
        }

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->back()->with('success', 'Acreditación guardada correctamente.');
    }

    public function revisar($id)
    {
        // Buscar la acreditación por ID y cargar el partido relacionado
        $acreditacion = Acreditacion::with('partido')->findOrFail($id);

        // Si el campo archivo tiene solo el nombre, añade la ruta base
        $acreditacion->archivo = asset('storage/' . $acreditacion->archivo);

        // Formatear la fecha y hora del partido
        if ($acreditacion->partido) {
            $acreditacion->proximo_partido = $acreditacion->partido->nombre; // Suponiendo que tienes un campo nombre en la tabla partidos
            $acreditacion->fecha_hora_partido = Carbon::parse($acreditacion->partido->fecha_hora)->format('d/m/Y H:i');
        }

        // Retornar la vista con los datos de la acreditación
        return inertia('Public/RevisarAcreditacion/Index', [
            'data' => $acreditacion,
        ]);
    }



    public function aprobar($id)
    {
        $acreditacion = Acreditacion::findOrFail($id);

        // Lógica para aprobar la acreditación
        $acreditacion->estado = 1; // Establece el estado como 'aprobada'
        $acreditacion->save();

        // Preparar los datos para el correo
        $data = [
            'nombre' => $acreditacion->nombre,
            'apellido' => $acreditacion->apellido,
            'tipo_acreditacion' => $acreditacion->tipo_acreditacion,
        ];

        // Enviar correo de notificación de aprobación
        try {
            Mail::to($acreditacion->correo)
                ->send(new FormularioAcreditacionMailable($data, 'Su solicitud ha sido aprobada'));

            return redirect()->back()->with('success', 'Acreditación aprobada correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al enviar el correo: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un problema al enviar el correo de aprobación.');
        }
    }

    public function rechazar($id)
    {
        try {
            // Buscar la acreditación por ID
            $acreditacion = Acreditacion::findOrFail($id);

            // Lógica para rechazar la acreditación
            $acreditacion->estado = false;
            $acreditacion->save();

            // Preparar los datos para el correo de rechazo
            $data = [
                'nombre' => $acreditacion->nombre,
                'apellido' => $acreditacion->apellido,
                'correo' => $acreditacion->correo,
            ];

            // Log para verificar la dirección de correo electrónico
            Log::info('Enviando correo de rechazo a: ' . $data['correo']);

            // Enviar correo de notificación de rechazo al usuario
            Mail::to($data['correo'])->send(new RechazoAcreditacionMailable($data));


            // Retornar una respuesta Inertia con un mensaje de éxito
            return redirect()->route('acreditacion.revisar', $id)
                ->with('success', 'Acreditación rechazada correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al rechazar la acreditación: ' . $e->getMessage());
            return redirect()->route('acreditacion.revisar', $id)
                ->with('error', 'Hubo un problema al rechazar la acreditación.');
        }
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
