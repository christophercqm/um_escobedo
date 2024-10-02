<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje de Contacto</title>
</head>
<body>
    <h1>Nuevo Mensaje de Contacto</h1>
    
    <p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
    <p><strong>Apellidos:</strong> {{ $data['apellidos'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Teléfono:</strong> {{ $data['telefono'] }}</p>
    <p><strong>Mensaje:</strong> {{ $data['mensaje'] }}</p>
</body>
</html>
