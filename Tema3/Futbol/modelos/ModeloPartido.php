<?php
class ModeloPartido{
    function obtenerPartidos(){
        $resultado = array();
        try {
            //Recuperar equpos de la BD y meterlo en el array como objetos
            $consulta = ConexionBD::$conexion->query('SELECT * from partidos p
            join equipos eL on p.id_equipoL= eL.id 
            join equipos eV on p.id_equipoV=eV.id');
            //Recuperar registros
            while($fila=$consulta->fetch()){
                $resultado[]=new Partido($fila[0],
                                        $fila['fecha'],
                                        new Equipo($fila['id_equipoL'],$fila[8],$fila[9]),
                                        new Equipo($fila['id_equipoV'],$fila[11],$fila[12]),
                                        $fila['golesEL'],
                                        $fila['golesEV'],
                                        $fila['finalizado']);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $resultado;
    }
    function crearPartido(Partido $p){
        $resultado = null;
        try {
            $consulta = ConexionBD::$conexion->prepare('INSERT into partidos values (default,?,?,?,0,0,false)');
            $r = $consulta->execute(array($p->getFecha(),$p->getEquipoL(),$p->getEquipoV()));
            if($r==1){
                //Obtener el id del partido creado y se lo ponemos a $p
                $p->setId(ConexionBD::$conexion->lastInsertId());
                return $p;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $resultado;
    }

    function obtenerPartido($id){
        $resultado = null;
        try {
            $consulta = ConexionBD::$conexion->prepare('SELECT * from partidos  p
                                                            join equipos eL on p.id_equipoL= eL.id 
                                                            join equipos eV on p.id_equipoV=eV.id
                                                            where p.id = ?');
            $r = $consulta->execute(array($id));
            if($r==true){
                if($fila=$consulta->fetch()){
                    $resultado = new Partido($fila[0],
                                        $fila['fecha'],
                                        new Equipo($fila['id_equipoL'],$fila[8],$fila[9]),
                                        new Equipo($fila['id_equipoV'],$fila[11],$fila[12]),
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
    function finalizarPartido(Partido $p){
        $resultado = false;
        try {
            $consulta = ConexionBD::$conexion->prepare('UPDATE partidos set golesEL=?,
                                                            golesEV=?, finalizado=true 
                                                            where id = ?');
            $r = $consulta->execute(array($p->getGolesEL(),$p->getGolesEV(),$p->getId()));
            if($r==1){
                return true;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $resultado;
    }
}
?>