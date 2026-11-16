<?php
require_once RAIZ.'/modelos/ModeloLogin.php';
require_once RAIZ.'/modelos/ModeloEquipo.php';

class FederacionController{
    private $modeloL;
    private $modeloE;

    function __construct()
    {
        $this->modeloL = new ModeloLogin();
        $this->modeloE = new ModeloEquipo();
    }
    function cargar(){
        require RAIZ.'/vistas/vista_federacion.php';
    }

    function usuarios(){
        try {
            //Recuperar usuarios
            $usuarios = $this->modeloL->obtenerUsuarios();
            //REcuperar equipos
            $equipos = $this->modeloE->obtenerEquipos();
        } catch (\Throwable $th) {
            $_SESSION['error'][] = $th->getMessage();
        }        
        //Cargar la vista de gestión de usuarios
        require RAIZ.'/vistas/vista_usuarios.php';
    }
}
?>