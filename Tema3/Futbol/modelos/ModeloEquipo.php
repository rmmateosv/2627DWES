<?php
class ModeloEquipo{
    function obtenerEquipos(){
        $resultado = array();
        try {
            //Recuperar equpos de la BD y meterlo en el array como objetos
            $consulta = ConexionBD::$conexion->query('SELECT * from equipos');
            //Recuperar registros
            while($fila=$consulta->fetch()){
                $resultado[]=new Equipo($fila['id'],$fila['nombre'],$fila['cp']);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $resultado;
    }
}
?>