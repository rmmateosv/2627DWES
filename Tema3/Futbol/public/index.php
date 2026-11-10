<?php
//Crear cosntante que contenga la carpeta del proyecto
//En este ejemplo sería PlantillaMVC
//__DIR__: Contiene la ruta absoluta de la carpeta en la que 
//está el fichero donde se pone.
define('RAIZ',__DIR__.'/..');

//Cargar las clases que mapean la tablas
require_once RAIZ.'/modelos/Usuario.php';

//array global para errores
$error=array();

//Iniciar sesión
session_start();

//Cargar datos de configuración
require_once RAIZ.'/baseDatos/ConexionBD.php';
ConexionBD::conectar();

//Obtener el controlador de la ruta
$controlador=$_GET['controlador']??'login';
//Creamos $accion con la acción de la url, y si no vienen ninguna, 
// ponemos f1 como acción por defecto.
$accion=$_GET['accion']??'login';

//Como los controladores son clases y empiezan por letra mayúscula,
//convertimos a mayúscula la primera letra de $controlador
//con la función ucfirst().
$controlador=ucfirst($controlador);

//Cargamos el fichero donde está definido el controlador
require_once RAIZ.'/controladores/'.$controlador.'Controller.php';

//Creamos un objeto controlador
$clase = $controlador.'Controller';
$objeto = new $clase();
//Llamaos a la función que hay en acción
$objeto->$accion();
?>