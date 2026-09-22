<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo 'Rosa'?></title>
</head>
<body>
    <h1>HOLA MUNDO HTML</h1>
    <?php
    echo 'Hola de nuevo desde PHP';
    //Pintar tabla html desde php
    echo '<table border="1">';
    echo '<tr>';
    echo '<td>Celda1</td><td>Celda2</td>';
    echo '</tr>';
    echo '</table>';
    //Declarar variable
    $nombre='rosa';
    echo '<h3>Mi nombre es '.$nombre.'</h3>';
    echo "<h3>Mi nombre es $nombre</h3>";   
    echo '<h3>Mi nombre es $nombre</h3>';
    $edad = 18;
     echo '<h3>Tengo'.$edad.'</h3>';   
    ?>
</body>
</html>