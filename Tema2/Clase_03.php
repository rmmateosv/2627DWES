<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    //Arrays escalares
    //Definición
    $misDatos = array('Rosa','Mateos', 18, 1.60, true);
    //Mostrar datos con foreach
    foreach($misDatos as $clave=>$valor){
        echo '<p>Posición:'.$clave.' - Valor:'.$valor.'</p>';
    }
    //Mostrar estructura y datos del array
    var_dump($misDatos);

    //Añadir un elemento al array
    $misDatos[] = 'C/ Antonio, Concha, 71, 10300';
    echo '<h3>Añadimos dirección</h3>';
    var_dump($misDatos);

    //Añadir elmento en posición 100
    $misDatos[100] = 'DAW';
    echo '<h3>Añadimos curso en posición 100</h3>';
    var_dump($misDatos);

    //ARRAYS ASOCIATIVOS, LA CLAVE NO ES UN NÚMERO SINO UN TEXTO
    //Definición
    $misDatosA = array('nombre'=>'Rosa','Apellidos'=>'Mateos', 
                        'edad'=>18, 'estatura'=>1.60, 'alumno'=>true);
    //Mostrar datos con foreach
    echo '<h3>Array Asociativo con mis datos</h3>';
    foreach($misDatosA as $clave=>$valor){
        echo '<p>Posición:'.$clave.' - Valor:'.$valor.'</p>';
    }
    var_dump($misDatosA);
    //Añadir un elemento al array
    $misDatosA['direccion'] = 'C/ Antonio, Concha, 71, 10300';
    echo '<h3>Añadimos dirección</h3>';
    var_dump($misDatosA);

    //Añadir a los dos arrays un nuevo elemento donde se almacene la dirección 
    //en array asociativo. 
    $misDatos[] = array('tipoV'=>'Calle','nombreV'=>'Antonio Concha','num'=>71,'cp'=>10300);
    $misDatosA['direccion2']=array('tipoV'=>'Calle','nombreV'=>'Antonio Concha','num'=>71,'cp'=>10300);
    //Mostrar los dos arrays con el nuevo elemento usando vardump().
    echo '<h3>Array Escalar</h3>';
    var_dump($misDatos);
    echo '<h3>Array Asociativo</h3>';
    var_dump($misDatosA);
    //Mostrar ambos arrays con foreach sin condicionarlo a la estructura en forma de tabla
    echo '<h3>Array Escalar en forma de tabla</h3>';
    //Escalar
    echo '<table border = "1">';
    echo '<tr>';
    foreach($misDatos as $clave=>$valor){
        if(is_array($valor)){
            echo '<td><table border="1"><tr>';
            foreach($valor as $c=>$v){
               echo '<td>'.$c.'<br/>'.$v.'</td>'; 
            }
            echo '</tr></table></td>';
        }
        else{
            echo '<td>'.$clave.'<br/>'.$valor.'</td>';
        }
    }
    echo '</tr>';
    echo '</table>';

    echo '<h3>Array Asociativo en forma de tabla</h3>';
    //Asociativo
    echo '<table border = "1">';
    echo '<tr>';
    foreach($misDatosA as $clave=>$valor){
        if(is_array($valor)){
            echo '<td><table border="1"><tr>';
            foreach($valor as $c=>$v){
               echo '<td>'.$c.'<br/>'.$v.'</td>'; 
            }
            echo '</tr></table></td>';
        }
        else{
            echo '<td>'.$clave.'<br/>'.$valor.'</td>';
        }
    }
    echo '</tr>';
    echo '</table>';

    //FUNCIONES
    //Recibe un array de números enteros y devuelve la suma de todos
    //Debe chequear que todos los elementos del array son número enteros
    //En caso de error devuelve null
    function suma($numeros){
        $resultado  = 0;
        foreach($numeros as $valor){
            if(is_int($valor)){
                $resultado+=$valor;
            }
            else{
                //Finalizar devolviendo null
                return null;
            }
            
        }
        return $resultado;
    }

    //Llamada a la función
    $nums = array(2,3,4,'hola');
    echo '<h3>FUNCIÓN SUMA:'.(suma($nums)==null?'Error en los datos':suma($nums)).'</h3>';

    //Hacer una función recursiva que muestre el array misDatos o misDatosA
    function pintarArray($array){
        echo '<table border="1">';
        echo '<tr>';
        foreach($array as $item){
            echo '<td>';
            //Si el elemento no es un array, se muestra el contenido
            if(!is_array($item)){
                echo $item;
            }
            else{
                //Pinto el array
                pintarArray($item);
            }
            echo '</td>';
        }
        echo '</tr>';
        echo '</table>';
    }
    //Probamos la función
    echo '<h3>FUNCIÓN RECURSIVA</h3>';
    pintarArray(array('Qué mal día','Hoy es lunes',28));
    pintarArray($misDatosA);
     ?>
</body>
</html>