<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acreditacion;
use App\Mail\FormularioAcreditacionMailable;
use App\Mail\AcreditacionAprobada;
use App\Mail\RechazoAcreditacionMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf as PDF;



class FormularioAcreditacionController extends Controller
{
    public function storeAcreditacion(Request $request)
    {
        Log::info('storeAcreditacion method called');

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
            'medio_al_que_pertenece' => 'nullable|string',
            'archivo' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'club_pertenece' => 'nullable|string',
        ]);

        Log::info('Datos validados recibidos del formulario: ', $validatedData);

        // Inicializa un array con los datos comunes, incluyendo tipo_acreditacion
        $dataToStore = [
            'tipo_acreditacion' => $validatedData['tipo_acreditacion'], // Asegúrate de incluirlo aquí
            'nombre' => $validatedData['nombre'],
            'apellido' => $validatedData['apellido'],
            'dni' => $validatedData['dni'],
            'club_pertenece' => $validatedData['club_pertenece'],
            'correo' => $validatedData['correo'],
            'telefono' => $validatedData['telefono'],
            'asunto' => $validatedData['asunto'],
            'proximo_encuentro' => $validatedData['proximo_encuentro'],
            'partido_id' => $validatedData['partido_id'],
            'medio_al_que_pertenece' => $validatedData['medio_al_que_pertenece'],
            'estado' => false // Inicializa estado como false (rechazada)
        ];

        // Solo agregar club_pertenece si el tipo de acreditación es cuerpo directivo, directivo o cuerpo técnico
        if (in_array($validatedData['tipo_acreditacion'], ['cuerpo_directivo', 'directivo', 'cuerpo_tecnico'])) {
            $dataToStore['club_pertenece'] = $validatedData['club_pertenece'];
        }

        // Crear y guardar la instancia del modelo
        $acreditacion = Acreditacion::create($dataToStore);
        Log::info('Acreditación creada con ID: ' . $acreditacion->id);

        // Manejar el archivo si existe
        if ($request->hasFile('archivo')) {
            $filePath = $request->file('archivo')->store('acreditaciones', 'public');
            $acreditacion->archivo = $filePath;
            $acreditacion->save(); // Guarda la ruta del archivo en la base de datos
            Log::info('Archivo subido y guardado en la base de datos: ' . $filePath);
        }

        // Cargar el partido relacionado
        $partido = $acreditacion->partido;
        Log::info('Partido relacionado cargado: ', $partido->toArray());

        // Mapear tipo de acreditación a un formato más legible
        $tipoAcreditacionLegible = $this->mapTipoAcreditacion($request->tipo_acreditacion);
        Log::info('Tipo de acreditación mapeada a formato legible: ' . $tipoAcreditacionLegible);

        // Formatear la fecha y hora del partido
        $fechaHoraFormateada = Carbon::parse($partido->fecha_hora)->format('d/m/Y H:i');
        Log::info('Fecha y hora del partido formateada: ' . $fechaHoraFormateada);

        // Preparar los datos para el correo
        $data = [
            'nombre' => $validatedData['nombre'],
            'apellido' => $validatedData['apellido'],
            'dni' => $validatedData['dni'],
            'club_pertenece' => $acreditacion->club_pertenece,
            'correo' => $validatedData['correo'],
            'telefono' => $validatedData['telefono'],
            'tipo_acreditacion' => $tipoAcreditacionLegible,
            'proximo_encuentro' => $validatedData['proximo_encuentro'],
            'fecha_hora' => $fechaHoraFormateada,
            'medio_al_que_pertenece' => $acreditacion->medio_al_que_pertenece,
            'asunto' => $validatedData['asunto'],
            'acreditacion_id' => $acreditacion->id,
        ];

        // Solo agregar el medio si el tipo de acreditación es "prensa"
        if ($validatedData['tipo_acreditacion'] === 'prensa') {
            $data['medio_al_que_pertenece'] = $validatedData['medio_al_que_pertenece'];
        }

        // Enviar el correo
        try {
            Log::info('Datos preparados para enviar el correo: ', $data);
            Log::info('Enviando correo con los siguientes datos: ', $data);

            // Asunto del correo actualizado para incluir el tipo de acreditación
            $asunto = "Solicitud de Acreditación ({$tipoAcreditacionLegible}) de {$validatedData['nombre']} {$validatedData['apellido']}";
            Log::info('Asunto del correo: ' . $asunto);

            // Verificar si hay un archivo adjunto
            $attachment = $acreditacion->archivo ? storage_path("app/public/{$acreditacion->archivo}") : null;
            if ($attachment) {
                Log::info('Archivo adjunto encontrado: ' . $attachment);
            } else {
                Log::info('No se adjuntará ningún archivo.');
            }

            // Enviar el correo
            Mail::to($validatedData['correo'])
                ->send(new FormularioAcreditacionMailable($data, $asunto, $attachment));

            Log::info('Correo enviado correctamente a: ' . $validatedData['correo']);
        } catch (\Exception $e) {
            // Log error si ocurre una excepción durante el envío del correo
            Log::error('Error al enviar el correo: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'No se pudo enviar el mensaje, por favor intente más tarde.']);
        }

        // Redirigir al usuario con un mensaje de éxito
        return back()->with('success', 'Acreditación guardada correctamente.');
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
        // Buscar la acreditación por ID
        $acreditacion = Acreditacion::findOrFail($id);

        // Actualizar el estado a 'aprobada'
        $acreditacion->estado = true;
        $acreditacion->save();

        // Preparar los datos para el correo
        $data = [
            'nombre' => $acreditacion->nombre,
            'apellido' => $acreditacion->apellido,
            'dni' => $acreditacion->dni,
            'tipo_acreditacion' => $this->mapTipoAcreditacion($acreditacion->tipo_acreditacion),
            'proximo_encuentro' => $acreditacion->proximo_encuentro,
            'fecha_hora' => Carbon::parse($acreditacion->partido->fecha_hora)->format('d/m/Y H:i'),
        ];

        // Crear el directorio si no existe
        $pdfDir = storage_path("app/public/pdf");
        if (!file_exists($pdfDir)) {
            mkdir($pdfDir, 0755, true);
            Log::info('Directorio creado: ' . $pdfDir);
        }

        // Generar el PDF
        try {
            Log::info('Generando PDF con los siguientes datos: ', $data);
            $pdf = PDF::loadView('pdf.acreditacion', compact('data')); // Usa compact aquí
            $pdfPath = $pdfDir . "/acreditacion_{$data['nombre']}_{$data['apellido']}.pdf";
            $pdf->save($pdfPath);
            Log::info('PDF generado y guardado en: ' . $pdfPath);
        } catch (\Exception $e) {
            Log::error('Error al generar el PDF: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un problema al generar el PDF.');
        }

        // Enviar correo de notificación de aprobación
        try {
            Mail::to($acreditacion->correo)
                ->send(new AcreditacionAprobada($data, null, $pdfPath));

            return redirect()->back()->with('success', 'Acreditación aprobada correctamente y correo enviado.');
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
