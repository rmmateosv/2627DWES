<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        form {
            height: 350px;
            width: 320px;
            margin: 0 auto;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            padding: 15px;
            padding-top: 35px;
            padding-bottom: 0px;
            margin-top: 20px;
        }

        div {
            width: 100px;
            padding: 10px;
        }

        label {
            margin: 10px;
        }

        input {
            border-radius: 10px;
            border-color: aliceblue;
            margin-top: 10px;
            width: 280px;
            height: 30px;
        }

        .botones {
            /* Centrar botones */
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            width: 300px;
        }

        button {
            width: 50px;
            height: 50px;
            margin: 0 auto;
            border: 0px;
            border-radius: 10px;
            background-color: #2795F5;
            color: white;
            font-size: 20px;
            text-align: center;
        }

        h3 {
            height: 40px;
            width: 300px;
            background-color: aquamarine;
            margin: 15px auto;
            text-align: center;
            line-height: 40px;
            border-radius: 10px;
            color: rgb(28, 85, 66);
        }

        h2 {
            height: 80px;
            width: 300px;
            background-color: rgb(236, 75, 75);
            margin: 15px auto;
            text-align: center;
            line-height: 40px;
            border-radius: 10px;
            color: rgb(61, 9, 9);
        }

        .volver{
            position: absolute;
            top: 0px;
            left: 0px;
            margin: 10px;
            padding: 10px;
            background-color: rgb(137, 75, 75);
            border-radius: 10px;
            font-weight: bold;
            text-align: center;
        }

        a{
            text-decoration: none;
            color: whitesmoke;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <h1>Calculadora</h1>

        <!-- Con required podemos hacer los campos obligatorios en
         los imputs -->

        <!-- El autocomplete este es para que no salga 
         repetido el numero que pongas -->
        <div>
            <label for="num1" name="num1">Numero 1.</label>
            <input type="text" name="num1" id="num1" autocomplete="off">
        </div>

        <div>
            <label for="num2" name="num2">Numero 2.</label>
            <input type="text" name="num2" id="num2" autocomplete="off">
        </div>

        <div class="botones">
            <button name="sumar">+</button>
            <button name="restar">-</button>
            <button name="multiplicar">*</button>
            <button name="dividir">/</button>
        </div>


    </form>

    <?php
    $numero1 = 0;
    $numero2 = 0;
    $resultado = 0;

    //Filtramos numeros
    //int y & sirven para modificar las variables por fuera de 
    //la funcion, si no sale 0 porque no se modifican.
    //int es para que no salga el mensaje ese.
    function comprobarNumero(float &$numero1, float &$numero2)
    {
        if (
            is_numeric($_POST['num1']) &&
            is_numeric($_POST['num2'])
        ) {
            $numero1 = $_POST['num1'];
            $numero2 = $_POST['num2'];
        } else {
            echo '<h2> Error, parametros incorrectos o faltantes</h2>';
            return false;
        }

        return true;
    }

    if (
        isset($_POST['sumar']) &&
        comprobarNumero($numero1, $numero2) == true
    ) {
        $resultado = $numero1 + $numero2;
        echo '<h3>El resultado es ' . $resultado . '</h3>';
    }

    if (
        isset($_POST['restar']) &&
        comprobarNumero($numero1, $numero2) == true
    ) {
        $resultado = $numero1 - $numero2;
        echo '<h3>El resultado es ' . $resultado . '</h3>';
    }

    if (
        isset($_POST['multiplicar']) &&
        comprobarNumero($numero1, $numero2) == true
    ) {
        $resultado = $numero1 * $numero2;
        echo '<h3>El resultado es ' . $resultado . '</h3>';
    }

    //Si divides entre cero, automaticamente se cambia a dividir
    //entre uno.
    if (
        isset($_POST['dividir']) &&
        comprobarNumero($numero1, $numero2) == true
    ) {
        if ($numero2 == 0) {
            $numero2 = 1;
        }

        $resultado = $numero1 / $numero2;
        echo '<h3>El resultado es ' . $resultado . '</h3>';
    }
    ?>

    <div class="volver">
        <a href="index.html">Volver</a>
    </div>

</body>

</html>