<?php
class Modelo1{
    private $texto;
    
    function __construct($texto)
    {
        $this->texto = $texto;
    }
    

    /**
     * Get the value of texto
     */ 
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @return  self
     */ 
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }
}
?>