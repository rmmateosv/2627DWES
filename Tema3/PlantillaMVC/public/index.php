<?php
//Crear cosntante que contenga la carpeta del proyecto
//En este ejemplo sería PlantillaMVC
//__DIR__: Contiene la ruta absoluta de la carpeta en la que 
//está el fichero donde se pone.
define('RAIZ',__DIR__.'/..');

//Iniciar sesión (aún no lo hemos visto)

//Cargar datos de configuración (aún no lo hemos visto)

//Obtener el controlador de la ruta
//Si no se especifica ninguno, se toma C1, como controlador por defecto
//La ruta debe ser: http://~/index.php=controlador=c1&accion=f1
//Podemos hacerlo con un if o con el operador ??. El if 
//es más largo, lo dejamos comentado.
/*if(isset($_GET['controlador'])){
    $controlador = $_GET['controlador'];
}
else{
    $controlador='c1';
}*/
$controlador=$_GET['controlador']??'c1';
//Creamos $accion con la acción de la url, y si no vienen ninguna, 
// ponemos f1 como acción por defecto.
$accion=$_GET['accion']??'f1';

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