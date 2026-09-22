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
        // Comentarios: // /*... */
        //Varibles: Empiezan por $ y no se indica tipo
        //El tipo cambia según el valor de la variable
        $nombre = 'Rosa';
        $altura = 1.60;
        $alumno = true;
        echo '<p>Mis datos:',$nombre,' ',$altura,$alumno,'</p>';
        //Ver tipo de una variable
        echo '<p>$nombre:'.gettype($nombre).'</p>';
        echo '<p>$altura:'.gettype($altura).'</p>';
        echo '<p>$alumno:'.gettype($alumno).'</p>';

        //Escapar caracteres
        echo '<p>\'$alumno\':'.gettype($alumno).'</p>';

        //Conversiones de tipo
        $numero = 4 + "2";
        echo '<p>$numero:'.$numero.'</p>';

        //IF()/ELSEIF()/ELSE
        $nota = rand(0, 10);
        echo '<p>Nota:'.$nota;
        if($nota<5){
            echo 'suspenso</p>';
        }
        elseif($nota<6){
            echo 'SUFICIENTE</p>';
        }
        elseif($nota<7){
            echo 'BIEN</p>';
        }
        elseif($nota<9){
            echo 'NOTABLE</p>';
        }
        elseif($nota<10){
            echo 'SOBRESALIENTE</p>';
        }
        else{
            echo 'MH';
        }

        

    ?>
</body>
</html>