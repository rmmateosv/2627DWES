<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capitales</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        form {
            background-color: white;
            width: 340px;
            height: 300px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            padding: 15px;
            padding-top: 5px;
            border-bottom: 4px solid #eceff1;
        }

        h3 {
            text-align: center;
        }

        input {
            align-items: center;
            margin: 0 auto;
            width: 335px;
            height: 30px;
            border-radius: 10px;
            border-color: azure;
            margin-bottom: 15px;
        }

        .botones {
            width: 340px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
        }

        /** el efecto lo vi en un video de midudev */
        .validar {
            padding: 10px;
            padding-left: 65px;
            padding-right: 65px;
            border-radius: 10px;
            border: 0px;
            background-color: rgb(76, 160, 76);
            color: white;
        }

        .validar {
            padding: 10px;
            padding-left: 65px;
            padding-right: 65px;
            border: none;
            border-radius: 14px;
            background: #f5a623;
            color: #1a1a2e;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s, opacity 0.2s;
            cursor: pointer;
            position: relative;
            z-index: 0;
            color: white;
        }

        .validar:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .validar::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg,
                    red, blue, deeppink, blue,
                    red, blue, deeppink, blue);
            background-size: 800%;
            border-radius: 10px;
            filter: blur(8px);
            animation: glowing 20s linear infinite;
        }

        .pasar {
            padding: 10px;
            padding-left: 65px;
            padding-right: 65px;
            border-radius: 10px;
            border: 0px;
            background-color: rgb(141, 7, 7);
            font-weight: bold;
            color: white;
        }

        .info {
            text-align: center;
            margin: 15px;
        }

        .volver{
            position: absolute;
            top: 0px;
            left: 0px;
            margin: 10px;
            padding: 10px;
            padding-left: 35px;
            padding-right: 35px;
            background-color: rgb(137, 75, 75);
            border-radius: 10px;
            font-weight: bold;
        }

        a{
            text-decoration: none;
            color: whitesmoke;
        }

        @keyframes glowing {
            0% {
                background-position: 0 0;
            }

            50% {
                background-position: 400% 0;
            }
        }
    </style>
</head>

<body>
    <?php
    //He necesitado algo de ayuda de IA porque no sabia como hacer
    //que se recordara la eleccion, la solucion era un campo oculto.

    $nombreFichero = "ficheros/capitales.txt";
    $lineas = file($nombreFichero);

    // Con un campo oculto guardamos el indice, al validar html no se va a acordar
    // pero si recuperamos el incide que hemos mandado si
    if (isset($_POST['validar']) && isset($_POST['indice_actual'])) {
        $indiceAzar = intval($_POST['indice_actual']);
    } else {
        $totalLineas = count($lineas);
        $indiceAzar = mt_rand(0, $totalLineas - 1);
    }

    $palabras = explode(';', $lineas[$indiceAzar]);
    $pais = trim($palabras[1]);
    $capitalCorrecta = trim($palabras[2]);
    ?>

    <form action="" method="post">
        <h1>Juego capital</h1>

        <h3>¿Cuál es la capital de <?php echo $pais; ?>?</h3>

        <!-- Esto no se ve y guarda el indice -->
        <input type="hidden" name="indice_actual" value="<?php echo $indiceAzar; ?>">

        <!-- si se ha pulsado validar y hay respuesta pinta la respuesta
         asi si se pulsa pasar la respuesta aparece vacia -->
        <input type="text" name="respuesta" id="respuesta" autocomplete="off" value="<?php echo (isset($_POST['validar']) && isset($_POST['respuesta'])) ? htmlspecialchars($_POST['respuesta']) : ''; ?>" placeholder="Escribe aquí...">

        <?php
        if (isset($_POST['validar'])) {
            if (!empty($_POST['respuesta'])) {
                $respuestaUsuario = trim($_POST['respuesta']);

                // strcasecmp() toma dos textos y los compara, si son iguales 
                // devuelve un 0
                if (strcasecmp($respuestaUsuario, $capitalCorrecta) === 0) {
                    echo '<h3 style="color: green;" class="info">¡Bien!</h3>';
                } else {
                    echo '<h3 style="color: red;" class="info">Mal, inténtalo de nuevo.</h3>';
                }
            } else {
                echo '<p style="color: orange;" class="info">Por favor, escribe una respuesta.</p>';
            }
        }
        ?>

        <div class="botones">
            <button type="submit" name="validar" class="validar">Validar</button>
            <button type="submit" name="pasar" class="pasar">Pasar</button>
        </div>
    </form>

    <div class="volver">
        <a href="index.html">Volver</a>
    </div>

</body>

</html>