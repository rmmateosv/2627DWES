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
                        $fila['perfil'],$fila['id_equipo']);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $resultado;
        
    }
    function obtenerUsuarios(){
        $resultado=array();
        try {
            //Hacemos un select a la tabla usuarios
            //Como no hay where, no hay parámetros, hacemos un query en vez de un prepare
            $consulta = ConexionBD::$conexion->query('SELECT * from usuarios');
            //Tratamos el resultado de la consulta que al ser un select * sin where
            //puede devolver más de un registro. HAcemos un WHILE
            while($fila=$consulta->fetch()){
                //Añadimos a resultado un objeto Usuario que se crea con los datos de fila
                $resultado[]=new Usuario($fila['dni'],$fila['nombre'],$fila['perfil'],$fila['id_equipo']);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $resultado;
    }
    function crearUsuario(Usuario $u){
        $resultado = false;
        try {
            $consulta = ConexionBD::$conexion->prepare('INSERT into usuarios values (default,?,?,sha2(?,512),?,?)');
            //numReg contiene el número de regristro insertados.
            //execute cuando la consulta es Insert, update o delete, devuelve el número de registros afectados
            $numReg=$consulta->execute(array($u->getDni(),$u->getNombre(),$u->getDni(),$u->getPerfil(),$u->getEquipo()));
            if($numReg==1){
                $resultado=true;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $resultado;
    }
}
?>