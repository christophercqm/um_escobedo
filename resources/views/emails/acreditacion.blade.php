@component('mail::message')
<div class="logo-escobedo" style="display: flex; justify-content: center;">
    <img src="https://pbs.twimg.com/profile_images/1611500112068345858/K2Dkrfy5_400x400.jpg" alt="U.M. Escobedo" style="width: 150px; margin-bottom: 20px; border-radius: 50%;">
</div>

<h1 style="text-align: center">Nueva Solicitud de Acreditación</h1>

<p style="text-align: center">Se ha recibido una nueva solicitud de acreditación en U.M. Escobedo. Aquí se encuentran los detalles de la solicitud:
</p>

<table class="data-table" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
    <thead>
        <tr>
            <th style="border: 1px solid #ddd; padding: 12px; background-color: #e0e7ff; font-weight: bold;">Descripción</th>
            <th style="border: 1px solid #ddd; padding: 12px; background-color: #e0e7ff; font-weight: bold;">Información proporcionada</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Tipo de Acreditación</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['tipo_acreditacion'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Nombre</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['nombre'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Apellido</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['apellido'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">DNI</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['dni'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Correo</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['correo'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Teléfono</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['telefono'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Equipo que pertenece</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['equipo_pertenece'] }}</td>
        </tr>
    </tbody>
</table>

<!-- Campo "Asunto" separado de la tabla para mayor claridad -->
<div style="margin-bottom: 20px;">
    <strong style="font-size: 16px;">Asunto:</strong>
    <div style="border: 1px solid #ddd; padding: 10px; background-color: #f9f9f9; margin-top: 10px;">
        {{ $data['asunto'] }}
    </div>
</div>

@component('mail::button', ['url' => '#']) <!-- Cambia '#' por la URL correcta -->
Ver solicitud completa
@endcomponent

<div class="footer" style="margin-top: 20px; font-size: 14px;">
    <small style="color: #888;">*Este es un correo automático, por favor no responda directamente a este mensaje.*</small>
</div>
@endcomponent
