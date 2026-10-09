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