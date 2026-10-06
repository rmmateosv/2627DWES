<?php
require_once 'controlador.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="">DNI</label>
            <input type="text" name="dni"/>
        </div>
        <div>
            <label for="">Nombre</label>
            <input type="text" name="nombre"/>
        </div>
        <div>
            <label for="">Fecha Nacimiento</label>
            <input type="date" name="fecha" id="">
        </div>
        <div>
            <label for="">Sexo</label>
            <input type="radio" name="sexo" id="" value="Hombre" checked/>Hombre
            <input type="radio" name="sexo" id="" value="Mujer"/>Mujer
        </div>
        <div>
            <label for="">Otras opciones</label>
            <input type="checkbox" name="opciones[]" id="" value="Bus"/> Transporte
            <input type="checkbox" name="opciones[]" id="" value="Beca"/> Beca
        </div>
        <div>
            <button type="submit" name="enviar">Enviar</button>
            <button type="reset" name="limpiar">Limpiar</button>
        </div>
    </form>
    <?php 
    //Pintar errores
    if(isset($error)){
        echo '<h3 style="color:red">'.$error.'</h3>';
    }
     ?>
</body>
</html>
