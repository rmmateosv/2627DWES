<?php
require_once 'Modelo.php';

//Programar botón Enviar
if(isset($_POST['enviar'])){
    //Crear un objeto alumno y guardarlo en el fichero de alumnos

    //Comprobación de campos
    if(empty($_POST['dni']) || empty($_POST['nombre']) || 
        empty($_POST['fecha']) || empty($_POST['sexo'])){
        $error = 'El dni, nombre, fecha de nacimiento o sexo no puden estar vacíos';    

    }
    else{

        //Ver si tiene bus
        if(isset($_POST['opciones']) && in_array('bus',$_POST['opciones'])){
            $bus='Sí';
        }
        else{
            $bus='No';
        }
        //Ver si tiene beca
        $beca=(isset($_POST['opciones']) && in_array('beca',$_POST['opciones'])?'Sí':'No');


        $a = new Alumno($_POST['dni'],$_POST['nombre'],
                    $_POST['fecha'],$bus,$_POST['sexo'],$beca);
    }
}
?>