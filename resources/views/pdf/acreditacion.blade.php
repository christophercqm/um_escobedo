<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Credencial U.M. Escobedo</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif; /* Fuente principal para el body */
        }

        .credential {
            background-color: #191919;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            min-height: 500px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: #C4D1EC;
            margin: 0 auto;
            position: relative;
            padding: 20px; /* Agregado padding para un mejor espaciado */
        }

        .header {
            background-color: #ee1d36;
            color: white;
            border-radius: 5px;
            text-align: center;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin: 0 auto;
            gap: 10px;
        }

        .header .title-header {
            font-family: 'Roboto', sans-serif; /* Mantener Roboto para el título */
            font-size: 24px; 
            font-weight: bold; /* Cambiado a bold para mayor énfasis */
        }

        .role {
            font-family: 'Roboto', sans-serif; /* Mantener Roboto para el título */
            font-size: 18px;
            text-align: center;
            margin: 10px 0;
        }

        .role .info-personal {
            gap: .5rem;
            margin: 10px 0;
        }

        .role .info-personal p {
            margin: 0;
        }

        .partido-fecha p {
            margin: 0;
            font-size: 16px; /* Puedes ajustar el tamaño aquí si lo deseas */
        }

        .role .name {
            font-family: 'Georgia', serif; /* Cambiar a Georgia para el nombre */
            font-size: 30px; 
            font-weight: bold; /* Negrita para el nombre */
        }

        /* Instagram icono en la parte inferior */
        .instagram {
            font-family: 'Arial', sans-serif; /* Cambiar a Arial para el texto de Instagram */
            font-size: 15px;
            color: #ee1d36;
            text-align: right;
            padding-right: 20px;
            position: relative;
            top: 60px;
        }

        .container-img {
            background-color: black;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="credential">
        <div class="header">
            <div class="container-img" style="margin: 0 auto; width: 100px; height: 100px; padding: 15px;">
                <img 
                    src="{{ public_path().'/images/logo-escobedo.png' }}"
                    alt="U.M. Escobedo"
                    style="width: 100%; height: 100%; object-fit: contain;"
                />
            </div>
            <span class="title-header">U.M. Escobedo</span>
        </div>
        <div class="role">
            <div class="info-personal">
                <p class="name">{{ $data['nombre'] }} {{ $data['apellido'] }}</p>
                <p class="dni">{{ $data['dni'] }}</p>
            </div>
            <p>{{ $data['tipo_acreditacion'] }}</p>
            <div class="partido-fecha">
                <p>{{ $data['proximo_encuentro'] }}</p>
                <p>{{ $data['fecha_hora'] }}</p> 
            </div>
        </div>
        <div class="footer">
            <p class="instagram">@um_escobedooficial</p>
        </div>
    </div>
</body>
</html>
