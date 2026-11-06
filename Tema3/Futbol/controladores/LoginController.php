<?php
require_once RAIZ.'/modelos/ModeloLogin.php';

class LoginController{
    public $modelo;
    
    function __construct()
    {
        $this->modelo = new ModeloLogin();
    }
    function login(){        
        //Cargar la vista
        require RAIZ.'/vistas/vista_login.php';
    }

    function loguear(){
        global $error;        
        if(empty($_POST['dni']) || empty($_POST['ps'])){
            $error[] = 'Debes rellenar dni y contraseña';
            //Nos quedamos en vista login
            require RAIZ.'/vistas/vista_login.php';
        }
        else{
            //Validar si el dni y la contraseña son correctos
            $error[]=$this->modelo->loguear($_POST['dni'],$_POST['ps']);
        }
        
    }
}
?>