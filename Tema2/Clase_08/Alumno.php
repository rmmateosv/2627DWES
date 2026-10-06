<?php
class Alumno{
    private $dni, $nombre, $fn, $bus, $sexo, $beca;

    function __construct($dni, $nombre, $fn, $bus, $sexo, $beca)
    {
       $this->dni = $dni; 
       $this->nombre = $nombre;
       $this->fn =  $fn;
       $this->bus = $bus;
       $this->sexo =$sexo;
       $this->beca =$beca;
    }

    function __destruct()
    {
        echo 'El alumno se ha liberado';
    }


    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     *
     * @return  self
     */ 
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of fn
     */ 
    public function getFn()
    {
        return $this->fn;
    }

    /**
     * Set the value of fn
     *
     * @return  self
     */ 
    public function setFn($fn)
    {
        $this->fn = $fn;

        return $this;
    }

    /**
     * Get the value of bus
     */ 
    public function getBus()
    {
        return $this->bus;
    }

    /**
     * Set the value of bus
     *
     * @return  self
     */ 
    public function setBus($bus)
    {
        $this->bus = $bus;

        return $this;
    }

    /**
     * Get the value of sexo
     */ 
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set the value of sexo
     *
     * @return  self
     */ 
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get the value of beca
     */ 
    public function getBeca()
    {
        return $this->beca;
    }

    /**
     * Set the value of beca
     *
     * @return  self
     */ 
    public function setBeca($beca)
    {
        $this->beca = $beca;

        return $this;
    }
}
?>