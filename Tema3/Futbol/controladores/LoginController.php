<?php
require_once RAIZ.'/modelos/ModeloLogin.php';

class LoginController{
    public $modelo;
    
    function __construct()
    {
        $this->modelo = new ModeloLogin();
    }
    function login(){ 
        //Si hay un usuario logueado, en función del perfil
        //redirige a su controlador
        if(isset($_SESSION['usuario'])){
            //Comprobar perfil
            if($_SESSION['usuario']->getPerfil()=='F'){
                //Cargar el controlador de Federación
                header('location:index.php?controlador=federacion&accion=cargar');
            }
            elseif($_SESSION['usuario']->getPerfil()=='A'){
                //Cargar el controlador de Federación
                header('location:index.php?controlador=arbitro&accion=cargar');
            }
            elseif($_SESSION['usuario']->getPerfil()=='J'){
                //Cargar el controlador de Federación
                header('location:index.php?controlador=jugador&accion=cargar');
            }
        }       
        //Cargar la vista
        require RAIZ.'/vistas/vista_login.php';
    }

    function loguear(){
        global $error;   
        try {
            if(empty($_POST['dni']) || empty($_POST['ps'])){
                throw new Exception('Debes rellenar dni y contraseña');               
            }
            else{
                //Validar si el dni y la contraseña son correctos
                $u=$this->modelo->loguear($_POST['dni'],$_POST['ps']);
                if($u==null){
                    //Login incoreccto
                    throw new Exception('Datos incorrectos'); 
                }
                else{
                    //Guardar en una variable de sesión los datos del usuario logueado
                    $_SESSION['usuario'] = $u;
                    //REcargar index, para que se actualice el aray $_SESSION
                    header('location:index.php');
                }
            }
        } catch (\Throwable $th) {
           $error[]=$th->getMessage();
        }  
        require RAIZ.'/vistas/vista_login.php';           
    }
    
}
?>