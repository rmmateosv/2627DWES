<?php
class C1Controller{
    function f1(){
        $texto = 'Texto generado en C1Controller, en la función f1';
        //Cargar la vista
        require RAIZ.'/vistas/v1.php';
    }
}
?>