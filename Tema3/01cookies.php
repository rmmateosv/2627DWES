<?php
if(isset($_POST['crearC'])){
    if(empty($_POST['nombrec']) || empty($_POST['valor'])){
        echo 'Rellena los datos de la cookie';
    }
    else{
        //crear o modificar la cookie si existe
        setcookie($_POST['nombrec'],$_POST['valor'],time()+24*60*60);
        //Recargamos la página para que se vuelva a cargar $_COOKIE
        header('location:01cookies.php');
    }
}
elseif(isset($_POST['borrarC'])){
    //Caducamos todas las cookies
    foreach($_COOKIE as $clave=>$valor){
        setcookie($clave,'',time()-1);
        header('location:01cookies.php');
    }
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
        <input type="text" name="nombrec" 
        placeholder="Introduce el identificador de la cookie">
        <input type="text" name="valor" 
        placeholder="Introduce el valor de la cookie">
        <button type="submit" name="crearC">Crear Cookie</button>
        <button type="submit" name="borrarC">Borrar Cookies</button>
    </form>
    <!-- Mostrar las cookies existentes -->
     <?php 
        //Las cookies se guardan en $_COOKIES. 
        //Este array se carga al e inicio de la ejecución de la página
        foreach($_COOKIE as $clave=>$valor){
            echo '<p>'.$clave.':'.$valor.'</p>';
        }
     ?>
</body>
</html>