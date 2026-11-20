
<?php
class Partido{
    private $id, $fecha, $equipoL, $equipoV, $golesEL, $golesEV, $finalizado;

    function __construct($id, $fecha, $equipoL, $equipoV, $golesEL, $golesEV, $finalizado)
    {
       $this->id=$id;  
       $this->fecha=$fecha; 
       $this->equipoL=$equipoL;
       $this->equipoV=$equipoV;
       $this->golesEL=$golesEL;
       $this->golesEV=$golesEV;
       $this->finalizado=$finalizado;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     */
    public function setFecha($fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of equipoL
     */
    public function getEquipoL()
    {
        return $this->equipoL;
    }

    /**
     * Set the value of equipoL
     */
    public function setEquipoL($equipoL): self
    {
        $this->equipoL = $equipoL;

        return $this;
    }

    /**
     * Get the value of equipoV
     */
    public function getEquipoV()
    {
        return $this->equipoV;
    }

    /**
     * Set the value of equipoV
     */
    public function setEquipoV($equipoV): self
    {
        $this->equipoV = $equipoV;

        return $this;
    }

    /**
     * Get the value of golesEL
     */
    public function getGolesEL()
    {
        return $this->golesEL;
    }

    /**
     * Set the value of golesEL
     */
    public function setGolesEL($golesEL): self
    {
        $this->golesEL = $golesEL;

        return $this;
    }

    /**
     * Get the value of golesEV
     */ 
    public function getGolesEV()
    {
        return $this->golesEV;
    }

    /**
     * Set the value of golesEV
     *
     * @return  self
     */ 
    public function setGolesEV($golesEV)
    {
        $this->golesEV = $golesEV;

        return $this;
    }

    /**
     * Get the value of finalizado
     */
    public function getFinalizado()
    {
        return $this->finalizado;
    }

    /**
     * Set the value of finalizado
     */
    public function setFinalizado($finalizado): self
    {
        $this->finalizado = $finalizado;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }
}
?>