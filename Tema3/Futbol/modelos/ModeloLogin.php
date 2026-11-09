<?php
require_once RAIZ.'/modelos/Usuario.php';
class ModeloLogin{
    public function loguear($dni,$ps){
        $resultado = null;
        try {
            //Acceder a la BD, para hacer un select con dni y ps
            $consulta = ConexionBD::$conexion->prepare('SELECT * from usuarios 
                    where dni = ? and password=sha2(?,512)');
            if($consulta->execute(array($dni,$ps))){
                //REcuperar el resultado del select y devolver 
                //los datos del usuario en un objeto de la clase Usuario

                //El select al acceder por dni, que es clave alternativa
                //nos devuleve o 0 un 1 registro como máximo
                //Recuperamos lo que devuelve en un if
                if($fila=$consulta->fetch()){
                    //Crear objeto usuario
                    $resultado = new Usuario($fila['dni'],$fila['nombre'],
                        $fila['perfil'],$fila['equipo']);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $resultado;
        
    }
}
?>