<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje de Contacto</title>
</head>
<body>

    @if($data['tipo'] === 'patrocinadores')
        <p><strong>Empresa:</strong> {{ $data['empresa'] }}</p>
        <p><strong>Nombre del Representante:</strong> {{ $data['nombreRepresentante'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Teléfono:</strong> {{ $data['telefono'] }}</p>
        <p><strong>Asunto:</strong> {{ $data['asunto'] }}</p>
    @else
        <p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
        <p><strong>Apellidos:</strong> {{ $data['apellidos'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Teléfono:</strong> {{ $data['telefono'] }}</p>
        <p><strong>Mensaje:</strong> {{ $data['mensaje'] }}</p>
    @endif
</body>
</html>
