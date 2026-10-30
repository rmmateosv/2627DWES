<?php 
//Iniciamos sesión
//Si no existe sesión, la crea u 
//Cargar en memoria $_SESSION.
session_start();
if(isset($_POST['crearV'])){
    if(empty($_POST['nombreV']) || empty($_POST['valorV'])){
        echo 'Rellena datos';
    }
    else{
        //Creo una variable de sesión, con el nombre y valor 
        //según los datos del formulario
        $_SESSION[$_POST['nombreV']]=$_POST['valorV'];
        //Recargar
        header('location:02sesiones.php');
    }
}
elseif(isset($_POST['borrarS'])){
    session_destroy();
     header('location:02sesiones.php');
}
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
        <input type="text" name="nombreV"
            placeholder="Introduce el identificador de la variable de sesión">
        <input type="text" name="valorV"
            placeholder="Introduce el valor de la variable">
        <button type="submit" name="crearV">Crear Variable de Sesión</button>
        <button type="submit" name="borrarS">Borrar Sesión</button>
    </form>
    <?php 
    foreach($_SESSION as $clave=>$s){
        echo '<h2>'.$clave.'-'.$s.'</h2>';
    }
     ?>
</body>

</html>