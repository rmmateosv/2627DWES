<?php
class Producto{
    private $nombre, $fecha, $categoria, $lacteo, $fresco,$panaderia,$otros,$precio,
    $tipoIva, $descuentos,$foto;
    function __construct($nombre, $fecha, $categoria, $lacteo, $fresco,$panaderia,$otros,$precio,
                            $tipoIva, $descuentos,$foto){
        $this->nombre=$nombre; 
        $this->fecha=$fecha; 
        $this->categoria=$categoria; 
        $this->lacteo=$lacteo; 
        $this->fresco=$fresco;
        $this->panaderia=$panaderia;
        $this->otros=$otros;
        $this->precio=$precio;
        $this->tipoIva=$tipoIva;
        $this->descuentos=$descuentos;
        $this->foto=$foto;
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
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of categoria
     */ 
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     *
     * @return  self
     */ 
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get the value of lacteo
     */ 
    public function getLacteo()
    {
        return $this->lacteo;
    }

    /**
     * Set the value of lacteo
     *
     * @return  self
     */ 
    public function setLacteo($lacteo)
    {
        $this->lacteo = $lacteo;

        return $this;
    }

    /**
     * Get the value of fresco
     */ 
    public function getFresco()
    {
        return $this->fresco;
    }

    /**
     * Set the value of fresco
     *
     * @return  self
     */ 
    public function setFresco($fresco)
    {
        $this->fresco = $fresco;

        return $this;
    }

    /**
     * Get the value of panaderia
     */ 
    public function getPanaderia()
    {
        return $this->panaderia;
    }

    /**
     * Set the value of panaderia
     *
     * @return  self
     */ 
    public function setPanaderia($panaderia)
    {
        $this->panaderia = $panaderia;

        return $this;
    }

    /**
     * Get the value of otros
     */ 
    public function getOtros()
    {
        return $this->otros;
    }

    /**
     * Set the value of otros
     *
     * @return  self
     */ 
    public function setOtros($otros)
    {
        $this->otros = $otros;

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of tipoIva
     */ 
    public function getTipoIva()
    {
        return $this->tipoIva;
    }

    /**
     * Set the value of tipoIva
     *
     * @return  self
     */ 
    public function setTipoIva($tipoIva)
    {
        $this->tipoIva = $tipoIva;

        return $this;
    }

    /**
     * Get the value of descuentos
     */ 
    public function getDescuentos()
    {
        return $this->descuentos;
    }

    /**
     * Set the value of descuentos
     *
     * @return  self
     */ 
    public function setDescuentos($descuentos)
    {
        $this->descuentos = $descuentos;

        return $this;
    }

    /**
     * Get the value of foto
     */ 
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set the value of foto
     *
     * @return  self
     */ 
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }
}
?>