@component('mail::message')
<div class="logo-escobedo" style="display: flex; justify-content: center; margin-bottom: 20px;">
    <img src="https://pbs.twimg.com/profile_images/1611500112068345858/K2Dkrfy5_400x400.jpg" alt="U.M. Escobedo" style="width: 150px; border-radius: 50%;">
</div>

<h1 style="text-align: center; color: #333;">Correo Recibido de Prueba</h1>

<p style="text-align: center; font-size: 16px; color: #555;">
    Este es un mensaje de prueba para confirmar la recepción del correo.
</p>

<table class="data-table" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
        <tr>
            <th style="border: 1px solid #ddd; padding: 12px; background-color: #e0e7ff; font-weight: bold;">Descripción</th>
            <th style="border: 1px solid #ddd; padding: 12px; background-color: #e0e7ff; font-weight: bold;">Información</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Nombre</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['nombre'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Apellido</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['apellido'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">DNI</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['dni'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Correo</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['correo'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Teléfono</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['telefono'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Tipo de Acreditación</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['tipo_acreditacion'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Próximo Encuentro</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['proximo_encuentro'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Fecha y Hora del Partido</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['fecha_hora'] ?? 'N/A' }}</td>
        </tr>
        
    </tbody>
</table>

<!-- Campo "Asunto" separado de la tabla para mayor claridad -->
<div style="margin: 20px 0;">
    <strong style="font-size: 16px;">Asunto:</strong>
    <div style="border: 1px solid #ddd; padding: 10px; background-color: #f9f9f9; margin-top: 10px;">
        {{ $data['asunto'] ?? 'N/A' }}
    </div>
</div>

@component('mail::button', ['url' => '#']) <!-- Cambia '#' por la URL correcta -->
Ver solicitud completa
@endcomponent

<div class="footer" style="margin-top: 20px; font-size: 14px; color: #888;">
    <small>*Este es un correo automático, por favor no responda directamente a este mensaje.*</small>
</div>
@endcomponent
