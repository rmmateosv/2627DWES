<?php
require_once 'Producto.php';

class ModeloTienda{
    private $nombreF = 'productos.txt';

    function guardarProducto(Producto $p){
        $resultado=false;
        //Abrimos el fichero de productos para añadir
        $f = fopen($this->nombreF,'a+');
        fwrite($f,$p->getNombre().';'.
        $p->getFecha().';'.
        $p->getCategoria().';'.
        $p->getLacteo().';'.
        $p->getFresco().';'.
        $p->getPanaderia().';'.
        $p->getOtros().';'.
        $p->getPrecio().';'.
        $p->getTipoIva().';'.
        $p->getDescuentos().';'.
        $p->getFoto().PHP_EOL);
        $resultado=true;
        return $resultado;
    }
    function obtenerProductos(){
        $resultado = array();
        //Comprobar si existe fichero de productos
        if(file_exists($this->nombreF)){
            //Carga los productos en un array de objetos Producto
            $datosFichero = file($this->nombreF,FILE_IGNORE_NEW_LINES);
            //Convertir cada linea del fichero en un objeto Producto
            foreach($datosFichero as $d){
                $campos = explode(';',$d);
                //Crear objeto
                $p = new Producto($campos[0],$campos[1],$campos[2],$campos[3],
                $campos[4],$campos[5],$campos[6],$campos[7],$campos[8],
                $campos[9],$campos[10]);
                //Añadimos el objeto al resultado
                $resultado[]=$p;
            }
        }
        return $resultado;
    }
}
?>