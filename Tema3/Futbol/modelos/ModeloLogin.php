<?php
class ModeloLogin{
    public function loguear($dni,$ps){
        try {
            //Acceder a la BD, para hacer un select con dni y ps
            $consulta = ConexionBD::$conexion->prepare('SELECT * from usuarios 
                    where dni = ? and ps=sha2(?,512)');
            if($consulta->execute([$dni,$ps])){
                
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}
?>