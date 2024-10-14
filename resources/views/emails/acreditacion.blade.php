@component('mail::message')
<div class="logo-escobedo" style="display: flex; justify-content: center; margin-bottom: 20px;">
    <img src="https://pbs.twimg.com/profile_images/1611500112068345858/K2Dkrfy5_400x400.jpg" alt="U.M. Escobedo" style="width: 150px; border-radius: 50%;">
</div>

<h1 style="text-align: center; color: #333;">Nueva Solicitud de Acreditación</h1>

<p style="text-align: center; font-size: 16px; color: #555;">
    Ha recibido una nueva solicitud de acreditación. Haga clic en el botón a continuación para revisarla.
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
            <td style="border: 1px solid #ddd; padding: 10px;">Apellidos</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['apellido'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">DNI</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['dni'] ?? 'N/A' }}</td>
        </tr>
        @if(strtolower($data['tipo_acreditacion']) !== 'arbitro')
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Carnet de Federación</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['carnet_federacion'] ?? 'N/A' }}</td>
        </tr>
        @else
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Tipo de Acreditación</td>
            <td style="border: 1px solid #ddd; padding: 10px;">Árbitro</td>
        </tr>
        @endif
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Correo</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['correo'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Teléfono</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['telefono'] ?? 'N/A' }}</td>
        </tr>
        @if(in_array($data['tipo_acreditacion'], ['Cuerpo Técnico', 'Cuerpo Directivo', 'Directivo']))
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Club al que pertenece</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['club_pertenece'] ?? 'N/A' }}</td>
        </tr>
        @endif
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Próximo Encuentro</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['proximo_encuentro'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Fecha y Hora del Partido</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['fecha_hora'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Tipo de Acreditación</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['tipo_acreditacion'] ?? 'N/A' }}</td>
        </tr>
        @if(isset($data['medio_al_que_pertenece']) && strtolower($data['tipo_acreditacion']) === 'prensa')
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Medio</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $data['medio_al_que_pertenece'] ?? 'N/A' }}</td>
        </tr>
        @endif
    </tbody>
</table>

<div style="margin: 20px 0;">
    <strong style="font-size: 16px;">Asunto:</strong>
    <div style="border: 1px solid #ddd; padding: 10px; background-color: #f9f9f9; margin-top: 10px;">
        <span>{{ $data['asunto'] ?? 'N/A' }}</span>
    </div>
</div>

<!-- Botón para revisar la solicitud -->
<div style="text-align: center; margin: 20px 0;">
    <a href="{{ route('acreditacion.revisar', ['token' => $data['token']]) }}" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
        Revisar Solicitud
    </a>
</div>


<div class="footer" style="margin-top: 20px; font-size: 14px; color: #888;">
    <small>*Este es un correo automático, por favor no responda directamente a este mensaje.*</small>
</div>
@endcomponent
