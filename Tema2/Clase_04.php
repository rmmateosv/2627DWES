<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>FUNCIONES DE PHP</h1>
    <h2>Funciones de tipos de datos/variables</h2>
    <?php
    $edad=18;
    if(isset($edad)){
        echo '$edad está declarada y su valor es '.$edad;
    }
    else{
        echo '<br/>$edad no está declarada';
    }

    if(isset($estatura)){
        echo '<br/$estatura está declarada y su valor es '.$estatura;
    }
    else{
        echo '<br/>$estatura no está declarada';
    }

    $nombre='';
    if(isset($nombre)){
        echo '<br/>$nombre está declarada y su valor es '.$nombre;
    }
    else{
        echo '<br/>$nombre no está declarada';
    }
    
    if(empty($nombre)){
        echo '<br/>La variable $nombre no está declarada o no tiene valor';
    }
    else{
        echo '<br/>$nombre está declarada y su valor es '.$nombre;
    }
    if(empty($estatura)){
        echo '<br/>La variable $estatura no está declarada o no tiene valor';
    }
    else{
        echo '<br/>$estatura está declarada y su valor es '.$estatura;
    }
    if(empty($edad)){
        echo '<br/>La variable $edad no está declarada o no tiene valor';
    }
    else{
        echo '<br/>$edad está declarada y su valor es '.$edad;
    }
    $edad = null; //no tiene valor
    if(empty($edad)){
        echo '<br/>La variable $edad no está declarada o no tiene valor';
    }
    else{
        echo '<br/>$edad está declarada y su valor es '.$edad;
    }
    $edad = false; //no tiene valor
    if(empty($edad)){
        echo '<br/>La variable $edad no está declarada o no tiene valor';
    }
    else{
        echo '<br/>$edad está declarada y su valor es '.$edad;
    }
    $edad = 0; //no tiene valor
    if(empty($edad)){
        echo '<br/>La variable $edad no está declarada o no tiene valor';
    }
    else{
        echo '<br/>$edad está declarada y su valor es '.$edad;
    }
    //Destruir una variable    
    unset($edad);
    if(isset($edad)){
        echo '<br/>$edad está declarada y su valor es '.$edad;
    }
    else{
        echo '<br/>La variable $edad no está incializadas';
    }
    ?>
    <h2>FUNCIONES DE FECHA Y HORA</h2>
    <?php 
    $fechaConFormato = 'Hoy es '.date('l d \d\e F \d\e Y').' y son las '. date('h:i:s');
    echo '<br/>'.$fechaConFormato;

    //Obtener fecha actual
    $hoy = time();
    echo '<br/>Hoy es '. date('d/m/Y', $hoy);

    $fecha0 = 0;
    echo '<br/>La fecha 0 es '. date('d/m/Y', $fecha0);
    $fecha1 = 24*60*60;
    echo '<br/>La fecha 1 es '. date('d/m/Y', $fecha1);
    
    echo '<br/>Segundos desde fecha 0 hasta ahora '.$hoy;

    $diaSemanaMiNaciento = date(('l'),strtotime('2000-10-12'));
    echo '<br/>Yo nací un '.$diaSemanaMiNaciento;
     ?>
     <h2>FUNCIONES DE ARRAYS</h2>
    <?php 
    $dias = array('L','M','X','J','V');
    echo '<br/>Número de elementos de $dias '.count($dias);
    echo '<br/>Número de elementos de $dias '.sizeof($dias);

    if(!in_array('S',$dias)){
        echo '<br/>S no está en el array';
    }
    if(in_array('V',$dias)){
        echo '<br/>V sí está en el array';
    }
    ?>
    <h2>FUNCIONES DE CADENAS</h2>
    <?php
    $texto = '-'.'     Este      texto     tiene muchos       espacios    '.'-';
    echo '<br/>'.trim($texto);

    $texto = implode('-',$dias); //Treansforma un array en un texto
    echo '<br/> Días de la semana como texto separados por -:'.$texto;

    $texto = 'nombre;apellidos;edad';
    $array = explode(';',$texto); //Treansforma un texto en un array
    echo '<br/>';
    var_dump($array);
    ?>
    <h2>DIRECTIVA INCLUDE Y REQUIRE</h2>
    <?php 
    include 'Clase04_f1.php'; //Se inserta lo que haya en el fichero
    require 'Clase04_f1.php';

    include_once 'Clase04_f1.php';
    include_once 'Clase04_f1.php';
    
    include 'Clase04_f2.php'; //Se inserta lo que haya en el fichero
    require 'Clase04_f2.php'; //Se inserta lo que haya en el fichero
    echo 'Esta línea no se llega a ejcutar porque el rquiere genera un error';
    ?>
</body>
</html>