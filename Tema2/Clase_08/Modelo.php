<?php
require_once 'Alumno.php';
class Modelo{
    private $nombreF = 'datos/alumnos.txt';
   
    function __construct(){
       
    }

    function guardarAlumno(Alumno $a){
        global $error;
        try {
           //Abrir el fichero (Si no existe, se crea automáticamente)
           $f = fopen($this->nombreF,'a+');
           //Excribo los datos del alumno separados por ;
           fwrite($f,$a->getDni().';'.
                    $a->getNombre().';'.
                    $a->getFn().';'.
                    $a->getBus().';'.
                    $a->getSexo().';'.
                    $a->getBeca().PHP_EOL);
            return true;
        } catch (\Throwable $th) {
            $error=$th->getMessage();
        }
        return false;
    }
    function cargarAlumnos(){
        $resultado =  array();
        //Comprobar si exsite el fichero
        if(file_exists($this->nombreF)){
            //Pasamos el fichero a un array de textos
            $texto = file($this->nombreF, FILE_IGNORE_NEW_LINES);
            //Transformamos el array de textos en array de objetos Alumno
            foreach($texto as $t){
                //Pasamos cada linea de texto a un array
                $datos = explode(';',$t);
                //Crear un objeto Alumno
                $a = new Alumno($datos[0],$datos[1],$datos[2],$datos[3],
                                $datos[4],$datos[5]);
                //Añadir el objeto al array
                $resultado[]=$a;
            }
        }
        return $resultado;
    }

    /**
     * Get the value of nombreF
     */ 
    public function getNombreF()
    {
        return $this->nombreF;
    }

    /**
     * Set the value of nombreF
     *
     * @return  self
     */ 
    public function setNombreF($nombreF)
    {
        $this->nombreF = $nombreF;

        return $this;
    }
}
?>