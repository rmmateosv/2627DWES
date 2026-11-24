<?php
class ModeloColegiado{
    function obtenerArbitros(){
        $resultado = array();
        try {
            $consulta = ConexionBD::$conexion->query('SELECT * from usuarios where perfil ="A"');
            while($fila=$consulta->fetch()){
                $resultado[]= new Usuario($fila['dni'],$fila['nombre'],'A',null);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $resultado;
    }

    function asignar($abitro,$partido){
        $resultado = false;
        try {
            $consulta = ConexionBD::$conexion->prepare('INSERT into colegiados values (?,?)');
            $r = $consulta->execute(array($partido,$abitro));
            if($r==1){
                $resultado = true;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $resultado;
    }
}
?>