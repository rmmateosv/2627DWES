<?php
require_once RAIZ.'/modelos/Usuario.php';

//Si hay un usuario logueado, en función del perfil
//redirige a su controlador
if(isset($_SESSION['usuario'])){
    //Comprobar perfil
    if($_SESSION['usuario']->getPerfil()=='F'){
        //Cargar el controlador de Federación
        header('location:'.RAIZ.'/public/index.php?controlador=federacion&accion=cargar');
    }
    elseif($_SESSION['usuario']->getPerfil()=='A'){
        //Cargar el controlador de Federación
        header('location:'.RAIZ.'/public/index.php?controlador=arbitro&accion=cargar');
    }
    elseif($_SESSION['usuario']->getPerfil()=='J'){
        //Cargar el controlador de Federación
        header('location:'.RAIZ.'/public/index.php?controlador=jugador&accion=cargar');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fútbol</title>
</head>
<body>
    <h1>LIGA DE FÚTBOL ies AUGUSTÓBRIGA</h1>
    <form action="index.php?controlador=login&accion=loguear" method="post">
        <div>
            <input type="text" name="dni" placeholder="DNI">
        </div>
        <div>
            <input type="password" name="ps" id="" placeholder="Constraseña">
        </div>
        <div>
            <button type="submit">Entrar</button>
        </div>
    </form>
    <?php 
        require RAIZ.'/vistas/pie.php';
     ?>
    
</body>
</html>