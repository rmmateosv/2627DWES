<?php
require_once RAIZ.'/modelos/ModeloLogin.php';

class LoginController{
    public $modelo;

    function __construct(){
        $modelo= new ModeloLogin();
    }
    
    

    function login(){        
        //Cargar la vista
        require RAIZ.'/vistas/vista_login.php';
    }

    function loguear(){
        global $error;        
        if(empty($_POST['dni']) || empty($_POST['ps'])){
            $error[] = 'Debes rellenar dni y contraseña';
        }
        //Validar si el dni y la contraseña son correctos
        $error[]=$modelo->loguear($_POST['dni'],$_POST['ps']);
    }
}
?>