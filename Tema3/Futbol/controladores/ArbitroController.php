<?php
require_once RAIZ.'/modelos/ModeloColegiado.php';
class ArbitroController{
    private $modeloC;
    function __construct()
    {
        $this->modeloC = new ModeloColegiado();
    }
    function cargar(){
        //Obtener la información de los partidos que arbitra
        $partidos =  $this->modeloC->obtenerPartidosColegiado($_SESSION['usuario']->getId());
        require RAIZ.'/vistas/vista_arbitro.php';
    }
}
?>