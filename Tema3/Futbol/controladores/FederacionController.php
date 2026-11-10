<?php
require_once RAIZ.'/modelos/ModeloLogin.php';

class FederacionController{
    private $modeloL;

    function __construct()
    {
        $this->modeloL = new ModeloLogin();
    }
    function cargar(){
        require RAIZ.'/vistas/vista_federacion.php';
    }

    function usuarios(){
        global $error;
        try {
            //Recuperar usuarios
            $usuarios = $this->modeloL->obtenerUsuarios();
        } catch (\Throwable $th) {
            $error[] = $th->getMessage();
        }        
        //Cargar la vista de gestión de usuarios
        require RAIZ.'/vistas/vista_usuarios.php';
    }
}
?>