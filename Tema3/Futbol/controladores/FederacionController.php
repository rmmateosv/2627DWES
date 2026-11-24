<?php
require_once RAIZ.'/modelos/ModeloLogin.php';
require_once RAIZ.'/modelos/ModeloEquipo.php';
require_once RAIZ.'/modelos/ModeloPartido.php';
require_once RAIZ.'/modelos/ModeloColegiado.php';

class FederacionController{
    private $modeloL;
    private $modeloE;
    private $modeloP;
    private $modeloC;

    function __construct()
    {
        $this->modeloL = new ModeloLogin();
        $this->modeloE = new ModeloEquipo();
        $this->modeloP = new ModeloPartido();
        $this->modeloC = new ModeloColegiado();
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
        //Cargar datos de partidos
        $partidos = $this->modeloP->obtenerPartidos();
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
    function finalizarP(){
        try {
           //Recuperar el partido para comprobar si existe
           $p=$this->modeloP->obtenerPartido($_POST['finalizarP']);
           if($p==null){
            throw new Exception('Partido no encontrado');
           }
           if($p->getFinalizado()){
            throw new Exception('Partido ya finalizado');
           }
           //Rellenamos los goles
           $p->setGolesEL(rand(0,10));
           $p->setGolesEV(rand(0,10));
           $p->setFinalizado(true);
           if(!$this->modeloP->finalizarPartido($p)){
                throw new Exception('No se ha finalizado el partido');
           }
           $_SESSION['mensajes'][]='Partido finalizado';

        } catch (\Throwable $th) {
             $_SESSION['error'][]=$th->getMessage();
        }
        header('location:index.php?controlador=federacion&accion=partidos');
    }

    function arbitros(){
        //REcuperar los datos del partido
        $p = $this->modeloP->obtenerPartido($_POST['arbitros']);
        //Recuperar los posibles árbitros
        $arbitros = $this->modeloC->obtenerArbitros();
        //Cargar vista para tabla colegiados
        require_once RAIZ.'/vistas/vista_colegiados.php';
    }

    function asignarA(){
        try {
           //Chequear que tene os partido y árbitro
           if(!isset($_POST['arbitro']) || !isset($_POST['asignar'])){
                throw new Exception('Selecciona árbitro y partido');
           }
           //Asignar el árbitro al partido
           if(!$this->modeloC->asignar($_POST['arbitro'],$_POST['asignar'])){
                throw new Exception('Error al asignar el árbitro');
           }
           $_SESSION['mensajes'][]='Árbitro asignado';
        } catch (\Throwable $th) {
            $_SESSION['error'][]=$th->getMessage();
        }
        header('location:index.php?controlador=federacion&accion=partidos');
    }
}
?>