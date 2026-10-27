<?php
class Modelo3{
    private $array;
    function __construct($dato)
    {
        $this->array = $dato;
    }

    /**
     * Get the value of array
     */ 
    public function getArray()
    {
        return $this->array;
    }

    /**
     * Set the value of array
     *
     * @return  self
     */ 
    public function setArray($array)
    {
        $this->array = $array;

        return $this;
    }
}
?>