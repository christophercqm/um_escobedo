@component('mail::message')
# Acreditación Recibida

Se ha enviado una solicitud de acreditación con los siguientes datos:

<table class="data-table" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Campo</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Valor</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;">Tipo de Acreditación</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['tipo_acreditacion'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;">Nombre</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['nombre'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;">Apellido</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['apellido'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;">DNI</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['dni'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;">Correo</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['correo'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;">Teléfono</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['telefono'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;">Asunto</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['asunto'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;">Equipo que pertenece</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['equipo_pertenece'] }}</td>
        </tr>
    </tbody>
</table>

@component('mail::button', ['url' => '#']) <!-- Puedes personalizar la URL -->
Ver más detalles
@endcomponent

<div class="footer" style="margin-top: 20px;">
    Gracias,<br>
    Escobedo<br>
    <small>*Este es un correo automático, por favor no responda directamente a este mensaje.*</small>
</div>
@endcomponent
