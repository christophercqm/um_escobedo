<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Credencial U.M. Escobedo</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        /* Aplicar la fuente globalmente a todo */
        body, html, h1, h2, h3, h4, h5, h6, p, span, div, a {
            font-family: 'Roboto', sans-serif !important; /* Define la fuente global */
        }

        /* Ajustes para la tarjeta de la credencial */
        .credential {
            background-color: #191919;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 500px;
            max-height: 500px;
            min-height: 500px;
            color: #C4D1EC;
        }

        /* Encabezado */
        .header {
            background-color: #ee1d36;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        /* Información personal */
        .role {
            font-size: 18px;
            text-align: center;
            margin: 10px 0;
        }

        .info-personal {
            margin: 10px 0;
        }

        .info-personal p {
            margin: 0;
        }

        /* Nombre */
        .name {
            font-size: 30px;
        }

        /* Fecha y hora del encuentro */
        .partido-fecha p {
            margin: 0;
            font-size: 16px;
        }

        /* Icono de Instagram en el pie */
        .instagram {
            font-size: 15px;
            color: #ee1d36;
        }

        /* Contenedor de imagen */
        .container-img {
            background-color: black;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="credential" style="position: relative; margin-left: auto; margin-right: auto;">
        <div class="header">
            <div class="container-img" style="width: 100px; height: 100px; padding: 15px; margin: 0 auto; display: flex; justify-content: center; align-items: center;">
                <img 
                    src="{{ public_path().'/images/logo-escobedo.png' }}" 
                    alt="U.M. Escobedo" 
                    style="width: 75px; object-fit: contain;"
                />
            </div>
            <p style="font-size: 24px; font-weight: 500; margin: 0;" class="roboto-text"><span>U.M. Escobedo</span></p>
        </div>
        <div class="role">
            <div class="info-personal">
                <p class="name">{{ $data['nombre'] }} {{ $data['apellido'] }}</p>
                <p class="dni">DNI: {{ $data['dni'] }}</p>
            </div>
            <p>{{ $data['tipo_acreditacion'] }}</p>
            <!-- Mostrar club_pertenece si es cuerpo técnico o directivo -->
            @if (in_array($data['tipo_acreditacion'], ['Cuerpo Técnico', 'Cuerpo Directivo']))
            <p>Club Perteneciente: {{ $data['club_pertenece'] }}</p>
            @endif
            <div class="partido-fecha">
                <p>{{ $data['proximo_encuentro'] }}</p>
                <p>{{ $data['fecha_hora'] }}</p>
            </div>
        </div>
        <div class="footer">
            <p class="instagram" style="position: absolute; bottom: 0; right: 0; padding-right: 20px">@um_escobedooficial</p>
        </div>
    </div>
</body>
</html>
