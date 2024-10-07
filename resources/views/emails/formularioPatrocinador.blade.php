@component('mail::message')
<div class="logo-escobedo" style="display: flex; justify-content: center;">
    <img src="https://pbs.twimg.com/profile_images/1611500112068345858/K2Dkrfy5_400x400.jpg" alt="U.M. Escobedo" style="width: 150px; margin-bottom: 20px; border-radius: 50%;">
</div>

<h1 style="text-align: center">Nuevo Mensaje de Patrocinador</h1>

<p style="text-align: center">
    Se ha recibido un nuevo mensaje desde el formulario de patrocinadores. A continuación se presentan los detalles:
</p>

<table class="data-table" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
    <thead>
        <tr>
            <th style="border: 1px solid #ddd; padding: 12px; background-color: #e0e7ff; font-weight: bold;">Campo</th>
            <th style="border: 1px solid #ddd; padding: 12px; background-color: #e0e7ff; font-weight: bold;">Información</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Empresa</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['empresa'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Nombre del Representante</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['nombreRepresentante'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Correo Electrónico</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['email'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Teléfono</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['telefono'] }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Mensaje</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['mensaje'] }}</td>
        </tr>
    </tbody>
</table>

<div class="footer" style="margin-top: 20px; font-size: 14px;">
    <small style="color: #888;">*Este es un correo automático, por favor no responda directamente a este mensaje.*</small>
</div>
@endcomponent
