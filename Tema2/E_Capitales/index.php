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
    <h1>JUEGO CAPITALES</h1>
    <h3>¿Cuál es la capital de <?php echo $paises[$pais-1][1]; ?>?</h3>

    <form action="" method="post">
        <input type="text" name="capital" value="<?php echo
        (isset($_POST['capital'])?$_POST['capital']:'') ?>" placeholder="Introduce Capital"/><br/>
        <button type="submit" name="validar" value="<?php echo $paises[$pais-1][0]?>">Validar</button>
        <button type="submit" name="pasar">Pasar</button>
    </form>
    <?php 
        if(isset($mensaje)){
            echo '<h3 style="color:green">'.$mensaje.'</h3>';
        }
        if(isset($error)){
            echo '<h3 style="color:red">'.$error.'</h3>';
        }
    ?>
</body>
</html>