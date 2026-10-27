<?php
//Obtener el nº de visitas
//Si no existe la cookie, es la primera visita, 
//si existe, se va incrementando el nº de vistas
if(!isset($_COOKIE['numV'])){
    $numVisitas=1;
}
else{
    $numVisitas = $_COOKIE['numV'] + 1;
}
//Guardamos el nº de vista en una cookie
setcookie('numV',$numVisitas);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>NÚMERO DE VISTAS DE LA PÁGINA <?php echo $numVisitas; ?></h1>
</body>
</html>