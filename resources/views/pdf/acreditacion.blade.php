<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Credencial U.M. Escobedo</title>
    <style>

       body, .credential {
            font-family: 'Roboto', sans-serif !important;
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
        }

        .header {
            background-color: #ee1d36;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin: 0 auto;
            gap: 10px;
        }

        .title-header  {
            font-family: 'Roboto', sans-serif !important;

        }

        .header .title-header {
            font-size: 24px;
            font-weight: 500;
        }

        .role {
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
            font-size: 16px;
        }

        .role .name {
            font-size: 30px;
        }

        /* Instagram icono en la parte inferior */
        .instagram {
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
    <div class="credential" style="display: flex; justify-content: space-between; flex-direction: column; font-family: 'Roboto', sans-serif;">
        <div class="header">

            <div class="container-img" style="margin: 0 auto; width: 100px; height: 100px; padding: 15px;">
                <img 
                    src="{{ public_path().'/images/logo-escobedo.png' }}"
                    alt="U.M. Escobedo"
                    style="img-fluid width: 100%; height: 100%; object-fit: contain;"
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
