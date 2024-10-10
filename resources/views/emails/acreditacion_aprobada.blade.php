@component('mail::message')
# ¡Felicidades, {{ $data['nombre'] }} {{ $data['apellido'] }}!

Nos complace informarte que tu solicitud de acreditación ha sido **aprobada**.

### Detalles de la Acreditación:
- **Tipo de Acreditación**: {{ $data['tipo_acreditacion'] }}
- **Próximo Encuentro**: {{ $data['proximo_encuentro'] }}
- **Fecha y Hora del Partido**: {{ $data['fecha_hora'] }}

Adjunto a este correo, encontrarás el documento de acreditación que puedes descargar y guardar.

Te agradecemos por tu solicitud. Si tienes alguna pregunta, no dudes en ponerte en contacto con nosotros.

Gracias,  
**U.M. Escobedo**
@endcomponent
