<?php
class ModeloColegiado{
    function obtenerArbitros(){
        $resultado = array();
        try {
            $consulta = ConexionBD::$conexion->query('SELECT * from usuarios where perfil ="A"');
            while($fila=$consulta->fetch()){
                $resultado[]= new Usuario($fila['id'],$fila['dni'],$fila['nombre'],'A',null);
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
            if($consulta->rowCount()==1){
                $resultado = true;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $resultado;
    }
    function obtenerColegiadosPartido($idPartido){
        $resultado = array();
        try {
            $consulta = ConexionBD::$conexion->prepare('SELECT * from colegiados c 
                                            join usuarios u on c.id_arbitro = u.id 
                                            where c.id_partido=?');
            if($consulta->execute(array($idPartido))){
                while($fila=$consulta->fetch()){
                    $resultado[]=new Usuario($fila['id_arbitro'],$fila['dni'],
                    $fila['nombre'],$fila['perfil'],null);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $resultado;
    }
    function obtenerPartidosColegiado($idArbitro){
        $resultado = array();
        try {
            $consulta = ConexionBD::$conexion->prepare('SELECT * from colegiados c 
                                            join partidos p on c.id_partido = p.id
                                            join equipos el on el.id = p.id_equipoL
                                            join equipos ev on ev.id = p.id_equipoV
                                            where c.id_arbitro=? 
                                            order by p.fecha desc');
            if($consulta->execute(array($idArbitro))){
                while($fila=$consulta->fetch()){
                    $resultado[]=new Partido($fila['id_partido'],
                    $fila['fecha'],
                    new Equipo($fila['id_equipoL'],$fila[10],$fila[11]),
                    new Equipo($fila['id_equipoV'],$fila[13],$fila[14]),
                    $fila['golesEL'],
                    $fila['golesEV'],
                    $fila['finalizado']);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $resultado;
    }
}
?>