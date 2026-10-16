<?php
function cargarPaises(){
    $paises = array();
    if(file_exists('.datos')){
        //Cargar fichero en un array
        $tmp = file('.datos',FILE_IGNORE_NEW_LINES);
        //Crear un array bidimensional donde los campos del fichero estén separados
        foreach($tmp as $t){
            $campos = explode(';',$t);
            $paises[]=$campos;
        }
    }
    return $paises;
}

//Cargar paises
$paises = cargarPaises();
//Obtenemos el nº de paises disponibles para jugar
$max = sizeof($paises);

//Generamos un nº aleatorio entre 1 y el $max para seleccionar un país al azar
//Solamente cuando le doy a pasar o no existe el botón de validar
if(isset($_POST['pasar']) || !isset($_POST['validar'])){
    $pais = rand(1,$max);
}
else{
    $pais = $_POST['validar'];
}

//Comprobar si el resultado es correcto
if(isset($_POST['validar']) && !empty($_POST['capital'])){
    if(strtoupper($_POST['capital'])==strtoupper($paises[$pais-1][2])){
        $mensaje = 'Correcto';
    }
    else{
        $error = 'Incorrecto';
    }
}
?>