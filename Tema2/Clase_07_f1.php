<?php 
//Si no viene parámetros en la ruta, redirigimos a Clase_07.php
if(!isset($_GET['nombre']) || !isset($_GET['cb']) || !isset($_GET['cf']) ){
    header('location:Clase_07.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="color:<?php echo $_GET['cf'] ?>" bgcolor="<?php echo $_GET['cb'] ?>">
    <h1>JUGADOR:<?php echo $_GET['nombre'] ?></h1>
</body>
</html>