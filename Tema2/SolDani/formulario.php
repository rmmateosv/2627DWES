<?php
//rutas
$archivo = "ficheros/productos.txt";
$cfotos = "fotos/";

//Si no valida no se manda
$errores = [];

$nombre = $_POST['nombre'] ?? '';
$fecha = $_POST['fecha'] ?? '';
$categoria = $_POST['categoria'] ?? 'alimentacion';
$tipo = $_POST['tipos'] ?? [];
$precio = $_POST['precio'] ?? '';
$iva = $_POST['tipoiva'] ?? '';
$descuentos = $_POST['descuentos'] ?? [];
$foto = '';

//reset
if (isset($_POST['reset'])) {
    echo '<h1>si</h1>';
    $_POST['nombre'] = '';
    $nombre = '';
    $fecha = '';
    $categoria = 'alimentacion';
    $tipo = [];
    $precio = '';
    $iva = '';
    $descuentos = [];
    $foto = '';
}

if (isset($_POST['submit'])) {

    //No campos vacios.
    //No fecha en pasado.
    //No dar de alta a un alimento en otros.
    if ((isset($_POST['categoria']) && $_POST['categoria'] == 'alimentacion')
        && (isset($_POST['tipos']) && (in_array('otros', $_POST['tipos'])))
    ) {
        echo '<h1> detectado </h1> ';
        $errores[] = 'error';
    }

    //Si es drogueria, solo puede ser otros.
    if ((isset($_POST['categoria']) &&
            $_POST['categoria'] == 'drogueria') &&
        (isset($_POST['tipos']) &&
            !(count($_POST['tipos']) === 1 && $_POST['tipos'][0] === 'otros'))
    ) {
        echo '<h1> detectado </h1> ';
        $errores[] = 'error';
    }

    //Iva solo del 21%
    if ((isset($_POST['categoria']) && $_POST['categoria'] == 'drogueria') &&
        (isset($_POST['tipoiva']) && $_POST['tipoiva'] != 21)
    ) {
        echo '<h1> detectado </h1> ';
        $errores[] = 'error';
    }

    // 5 KB en bytes (5 * 1024)
    $max_size = 5120;

    if ($_FILES['foto']['size'] > $max_size) {
        //DIE
        echo ("Error: El archivo supera el límite permitido de 5 KB.");
        $errores[] = 'error';
    }

    if (!is_numeric($_POST['precio'])) {
        echo 'error';
        $errores[] = 'error';
    }

    //Si no hay errores
    if (empty($errores)) {
        // Crear las carpetas si no existen
        // esto he necesitado ayuda
        if (!is_dir("ficheros")) {
            mkdir("ficheros", 0777, true);
        }

        if (!is_dir($cfotos)) {
            mkdir($cfotos, 0777, true);
        }

        if (
            isset($_FILES['foto']) &&
            $_FILES['foto']['error'] === UPLOAD_ERR_OK
        ) {
            $extension = strtolower(
                pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION)
            );

            $extensionesPermitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

            if (in_array($extension, $extensionesPermitidas, true)) {

                // Nombre único para evitar sobrescribir fotografías
                $nombreFoto = uniqid('foto_', true) . '.' . $extension;

                if (move_uploaded_file(
                    $_FILES['foto']['tmp_name'],
                    $cfotos . $nombreFoto
                )) {
                    $foto = $nombreFoto;
                } else {
                    $errores[] = "No se pudo guardar la fotografía.";
                }
            } else {
                $errores[] = "El formato de imagen no está permitido.";
            }
        }

        $producto = [
            "nombre" => $nombre,
            "fecha" => $fecha,
            "categoria" => $categoria,
            "tipo" => $tipo,
            "precio" => $precio,
            "iva" => $iva,
            "descuentos" => $descuentos,
            "foto" => $foto
        ];

        $linea = json_encode(
            $producto,
            JSON_UNESCAPED_UNICODE
        );

        file_put_contents(
            $archivo,
            $linea . PHP_EOL,
            FILE_APPEND | LOCK_EX
        );

        echo 'Producto reguistrado';

        //vacia
        $nombre = '';
        $fecha = '';
        $categoria = 'alimentacion';
        $tipo = [];
        $precio = '';
        $iva = '';
        $descuentos = [];
        $foto = '';
    }

    if (!empty($errores)) {
        foreach ($errores as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>

    <style>
        body {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            justify-content: center;
            gap: 170px;
            padding: 40px;
            flex-wrap: wrap;
        }

        h1 {
            text-align: center;
            border-bottom: 4px solid #426c88;
        }

        .productos_contenedor {
            flex: 1;
            min-width: 300px;
            max-width: 12000px;
        }

        .contenedor {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            justify-content: center;
            gap: 15px;
            padding: 20px;
            flex-wrap: wrap;
        }

        .tarjeta {
            background-color: white;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 175px;
            flex: 1 1 140px;
            /* Base de 140px. Entrarán muchas más por fila */
            max-width: 180px;
            padding: 15px;
            border-radius: 10px;
        }

        .formulario-reguistrar {
            flex: 0 0 400px;
            position: sticky;
            top: 40px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            padding: 15px;
            border-radius: 10px;
        }

        .im {
            border-bottom: 4px solid #3b9cdd;
        }

        .imagen {
            width: 175px;
            height: 120px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .tipo-contenedor {
            width: 300px;
        }

        .tipo {
            display: inline;
        }

        #tipo {
            font-size: x-large;
            border-bottom: 4px solid #2e414e;
            display: block;

        }

        input {
            padding: 5px;
            border-radius: 10px;
            border: 2px solid black;
            margin-bottom: 20px;
        }

        #nombre {
            width: 300px;
        }

        #fecha {
            width: 300px;
        }

        #categoria {
            width: 320px;
            height: 30px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        #precio {
            width: 300px;
        }

        .opcion-checkbox {
            display: inline-flex;
            white-space: nowrap;
            margin-right: 12px;
            gap: 4px;

        }

        #tipoiva {
            width: 315px;
            height: 30px;
            border-radius: 10px;
            border: 2px solid black;
            margin-bottom: 10px;
        }

        #descuentos {
            width: 300px;
            height: 140px;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        #joven {
            padding: 15px;
            text-align: center;
        }

        #jubilado {
            padding: 15px;
            text-align: center;
        }

        #desempleado {
            padding: 15px;
            text-align: center;
        }

        /** oculatar scroll del imput multiple */
        /* Para Chrome, Edge, Safari y Opera */
        select[multiple]::-webkit-scrollbar {
            display: none;
        }

        /* Para Firefox */
        select[multiple] {
            scrollbar-width: none;
        }

        /* Para Internet Explorer y Edge antiguo */
        select[multiple] {
            -ms-overflow-style: none;
        }

        #foto {
            height: 30px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }

        /* Fuerza el centrado del botón y texto interno en Chrome/Edge */
        #foto::-webkit-file-upload-button {
            height: 100%;
            align-items: center;
            display: inline-flex;
        }

        .botones-grupo {
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
        }

        #submit {
            padding: 10px;
            padding-left: 45px;
            padding-right: 45px;
            color: white;
            background-color: rgb(93, 186, 0);
            border-radius: 10px;
            border: 0px;
        }

        #reset {
            padding: 10px;
            padding-left: 45px;
            padding-right: 45px;
            color: white;
            background-color: rgb(186, 0, 0);
            border-radius: 10px;
            border: 0px;
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
    </style>
</head>

<body>
    <div class="productos_contenedor">
        <h1>Productos reguistrados</h1>

        <div class="contenedor">
            <?php
            // Comprobar si existe el archivo
            if (file_exists($archivo)) {

                // Leer todas las líneas del archivo
                $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

                // Crear una tarjeta por cada producto
                foreach ($lineas as $linea) {

                    // Convertir la línea JSON en un array asociativo
                    $producto = json_decode($linea, true);

                    // Saltar líneas que no se puedan interpretar
                    if (!is_array($producto)) {
                        continue;
                    }

                    // Recuperar los datos del producto
                    $nombrep = $producto['nombre'] ?? '';
                    $fechap = $producto['fecha'] ?? '';
                    $categoriap = $producto['categoria'] ?? '';
                    $tipop = $producto['tipo'] ?? [];
                    $preciop = $producto['precio'] ?? '';
                    $ivap = $producto['iva'] ?? '';
                    $descuentosp = $producto['descuentos'] ?? [];
                    $fotop = $producto['foto'] ?? '';

            ?>

                    <div class="tarjeta">

                        <h3 class="im"><?= htmlspecialchars($nombrep) ?></h3>

                        <p>Fecha: <?= htmlspecialchars($fechap) ?></p>

                        <p>Categoría: <?= htmlspecialchars($categoriap) ?></p>

                        <p>Tipo: <?= htmlspecialchars(implode(", ", $tipop)) ?></p>

                        <p>Precio: <?= htmlspecialchars($preciop) ?> €</p>

                        <p>IVA: <?= htmlspecialchars($ivap) ?>%</p>

                        <p>
                            Descuentos:
                            <?= htmlspecialchars(
                                is_array($descuentosp)
                                    ? implode(", ", $descuentosp)
                                    : $descuentosp
                            ) ?>
                        </p>

                        <?php
                        // Comprobar que el producto tiene imagen
                        // y que el archivo existe realmente
                        $rutaFoto = $cfotos . basename($fotop);

                        if ($fotop !== '' && is_file($rutaFoto)) {
                        ?>

                            <img
                                src="<?= htmlspecialchars($rutaFoto) ?>"
                                alt="<?= htmlspecialchars($nombrep) ?>"
                                class="imagen">

                        <?php
                        }
                        ?>

                    </div>

            <?php
                }
            } else {
                echo "<p>No hay productos guardados todavía.</p>";
            }
            ?>
        </div>
    </div>

    <div>
        <form class="formulario-reguistrar" action="" method="post" enctype="multipart/form-data">
            <h1>Reguistrar producto</h1>


            <div class="formulario">
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre"
                        id="nombre" autocomplete="off" placeholder="Ej. Pan"
                        required="true"
                        value="<?php echo $nombre ?>">
                </div>

                <div>
                    <label for="fecha">Fecha de Alta</label>
                    <input type="date" name="fecha" id="fecha"
                        value="<?php echo $fecha; ?>"
                        min="<?php echo date('Y-m-d'); ?>"
                        required="true">
                </div>

                <div>
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria"
                        required="true">
                        <option value="alimentacion" <?php echo ($categoria == 'alimentacion' ? 'selected' : '') ?>>Alimentacion</option>
                        <option value="drogueria" <?php echo ($categoria == 'drogueria' ? 'selected' : '') ?>>Drogueria</option>
                    </select>
                </div>

                <div class="tipo-contenedor">
                    <label for="tipo" class="tipo" id="tipo">Tipo</label><br />

                    <!-- Envolvemos cada opción en un span para que no se separen el texto y su cuadro -->
                    <span class="opcion-checkbox">
                        <label for="lacteos" class="tipo">Lacteos</label>
                        <input type="checkbox" name="tipos[]" id="lacteos" value="lacteos" <?php if (in_array('lacteos', $tipo)) echo 'checked'; ?>>
                    </span>

                    <span class="opcion-checkbox">
                        <label for="frescos" class="tipo">Frescos</label>
                        <input type="checkbox" name="tipos[]" id="frescos" value="frescos" <?php if (in_array('frescos', $tipo)) echo 'checked'; ?>>
                    </span>

                    <span class="opcion-checkbox">
                        <label for="panaderia" class="tipo">Panaderia</label>
                        <input type="checkbox" name="tipos[]" id="panaderia" value="panaderia" <?php if (in_array('panaderia', $tipo)) echo 'checked'; ?>>
                    </span>

                    <span class="opcion-checkbox">
                        <label for="otros" class="tipo">Otros</label>
                        <input type="checkbox" name="tipos[]" id="otros" value="otros" <?php if (in_array('otros', $tipo)) echo 'checked'; ?>>
                    </span>
                </div>

                <div>
                    <label for="precio">Precio</label>
                    <input type="texto" name="precio" id="precio" required="true"
                        placeholder="Ej. 5.50"
                        value="<?php echo ($precio); ?>">
                </div>

                <div>
                    <label for="tipoiva" required="true">Tipo de IVA</label>
                    <select name="tipoiva" id="tipoiva">
                        <option value="21" <?php echo ($iva == '21' ? 'selected' : ''); ?>>21%</option>
                        <option value="10" <?php echo ($iva == '10' ? 'selected' : ''); ?>>10%</option>
                        <option value="4" <?php echo ($iva == '4' ? 'selected' : ''); ?>>4%</option>
                    </select>
                </div>

                <div>
                    <label for="descuentos" required="true">Descuentos</label>
                    <select name="descuentos[]" id="descuentos" multiple>
                        <option id="joven" value="joven" <?php echo (in_array('joven', (array)$descuentos) ? 'selected' : '') ?>>Joven</option>
                        <option id="jubilado" value="jubilado" <?php echo (in_array('jubilado', (array)$descuentos) ? 'selected' : '') ?>>Jubilado</option>
                        <option id="desempleado" value="desempleado" <?php echo (in_array('desempleado', (array)$descuentos) ? 'selected' : '') ?>>Desempleado</option>

                    </select>
                </div>

                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" required="true" accept="image/*">
                </div>

                <div class="botones-grupo">
                    <button id="submit" type="submit" name="submit">Guardar</button>
                    <button id="reset" type="reset" name="reset">Limpiar</button>
                </div>

            </div>
        </form>

        <div class="volver">
            <a href="index.html">Volver</a>
        </div>
    </div>
</body>

</html>