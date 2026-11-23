<?php
require_once RAIZ.'/modelos/ModeloLogin.php';
require_once RAIZ.'/modelos/ModeloEquipo.php';
require_once RAIZ.'/modelos/ModeloPartido.php';

class FederacionController{
    private $modeloL;
    private $modeloE;
    private $modeloP;

    function __construct()
    {
        $this->modeloL = new ModeloLogin();
        $this->modeloE = new ModeloEquipo();
        $this->modeloP = new ModeloPartido();
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
    function partidos(){
        //Cargar equipos para pintarlos en la vista
        $equipos = $this->modeloE->obtenerEquipos();
        require RAIZ.'/vistas/vista_partidos.php';
    }
    function crearP(){
        try {
            //Comprobar que hay fecha y equipos
            if(empty($_POST['fecha']) || empty($_POST['equipoL']) || empty($_POST['equipoV'])){
                throw new Exception('Rellena la fecha y los equipos');
            }
            //Comprobar que el EL y EV no coinciden
            if($_POST['equipoL'] == $_POST['equipoV']){
                throw new Exception('Los equipos no pueden coincidir');
            }
            //Crear partido
            $p=$this->modeloP->crearPartido(new Partido(null,$_POST['fecha'],
            $_POST['equipoL'],$_POST['equipoV'],null,null,null));
            //Generar mensajes informativos
            $_SESSION['mensajes'][]='Partido creado con id:'.$p->getId();

            
        } catch (\Throwable $th) {
            $_SESSION['error'][]=$th->getMessage();
        }
        header('location:index.php?controlador=federacion&accion=partidos');
    }
}
?>