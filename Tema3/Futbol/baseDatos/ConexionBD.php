<?php
class ConexionBD{

    public static $conexion;

    static function conectar()
    {
       try {
            //Leer los datos de conexión del fichero .config
            if(!file_exists(RAIZ.'/.config')){
                throw new Exception('No existe el fichero de configuración');
            }
            $tmp = file(RAIZ.'/.config',FILE_IGNORE_NEW_LINES);
            //Recorremos $tmp para acceder a los datos de conexión y guardarlos en un array
            $datosC = array();
            foreach($tmp as $t){
                //$t=>HOST=localhost
                $linea = explode('=',$t); //linea= array('HOST','localhost')
                $datosC[$linea[0]]=$linea[1];
            }
            //Establecer conexión con la BD, con PDO
            $url='mysql:host='.$datosC['HOST'].';port='.$datosC['PUERTO'].';dbname='.$datosC['BD'];
            self::$conexion = new PDO($url,$datosC['USUARIO'],$datosC['PS']);
       } catch (\Throwable $th) {
            throw $th;
       } 
    }
}
?>