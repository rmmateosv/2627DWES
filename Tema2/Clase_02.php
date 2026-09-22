<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Delimitador de php -->
    <?php
    //Ámbito de variables
    //Siempre son locales al módulo en el que se definen
    $color = 'rojo';

    //Definimos una función
    function pintarColor()
    {
        $color = "verde";
        echo '<h3>Color Local</h3>';
        echo "Color:" . $color;
    }

    //Lamar a la función
    pintarColor(); //Muestra la variable local a la función

    //Definimos otra función que trabaja con la variable de forma global
    function pintarColor2()
    {
        global $color;
        echo '<h3>Color Global</h3>';
        echo "Color:" . $color;
    }

    //Lamar a la función
    pintarColor2(); //Muestra rojo, varable global


    //VARABLES PREDEFINIDAS
    //mostrar version de php
    echo '<h3> Software del servidor:' . $_SERVER['SERVER_SOFTWARE'] . '</h3>';
    //var_dump($_SERVER); //Muestra estructura y datos de S_SERVER

    //CONSTANTES
    const CURSO = '2ºDAW';
    define('CICLO', 'DAW');
    echo '<h3>Curso:' . CURSO . '-CLICLO:' . CICLO . '</h3>';

    //COSNTANTES PREDEFINIDAS
    echo '<h3>Versión de PHP:' . PHP_VERSION . '</h3>';

    //OPERADORES: Igual que en java 
    //Diferentes: 
    //Potencia **
    echo '<h3>2 elevado a 3:' . (2 ** 3) . '</h3>';
    //Comparción de valor y tipo === !==
    $v1 = 1;
    $v2 = '1';
    if ($v1 == $v2) {
        echo 'Las variables tiene el mismo valor<br/>';
    } else {
        echo 'Las variables no tiene el mismo valor<br/>';
    }
    if ($v1 === $v2) {
        echo 'Las variables tiene el mismo valor y el mismo tipo<br/>';
    } else {
        echo 'Las variables no tiene el mismo valor o el mismo tipo<br/>';
    }

    //Estructuras selectivas
    //IF/ELSEIF/ELSE
    //OPERADOR TERNARIO (condicion?valorSiVerdadero:valorSiFalso)
    $nota = 3;
    $calificacion = $nota < 5 ? 'suspenso' : 'aprobado';
    echo '<h3>Nota:' . $nota . '-' . $calificacion . '</h3>';
    
    //Estructuras de control
    // = que en java
    //Diferente: foreach: Para recorrer arrays
    echo '<h3>';
    $colores = array("rojo", "verde", "azul");
    foreach($colores as $valor){
        echo $valor.' ';
    }
    echo '</h3>';

    //Recupera el índice del array
    echo '<h3>';
    $colores = array("rojo", "verde", "azul");
    foreach($colores as $indice =>$valor){
        echo 'colores['.$indice.']='.$valor.' ';
    }
    echo '</h3>';

    //Ejercicio
    //Mostrar una tabla con las tablas de multiplicar del 0 al 10.
    //Debes altenernar  el color de fondo entre blanco y gris por número.   
    echo '<h3>TABLA ENTERA DESDE PHP</h3>';
    echo '<table  border="1">';
    for($i=1;$i<=10;$i++){
        echo '<tr bgcolor="'.($i%2==0?'grey':'white').'">';
        for($j=1;$j<=10;$j++){
            echo '<td>'.$i*$j.'</td>';
        }
    }
    echo '</table>';
    
    echo '<h3>TABLA ENTERA CON HTML Y PHP</h3>';
    ?>
    <table border="1">
        <?php
        for($i=1;$i<=10;$i++){
            //Pintar cada tabla de multiplicar en una fila nueva
            ?>
            <tr bgcolor="<?php echo ($i%2==0?'grey':'white')?>"> <!-- filas pares gris e impares blanco --> 
                <?php
                for($j=1;$j<=10;$j++){
                    echo '<td>'.$i*$j.'</td>';
                }
                ?>
            </tr>            
        <?php
        }
        ?>
    </table>
</body>

</html>