<?php
class Colegiado{
    private $id_arbitro, $id_partido;

    function __construct($id_arbitro, $id_partido)
    {
        $this->id_arbitro=$id_arbitro;
        $this->id_partido=$id_partido;
    }


    public function getIdArbitro()
    {
        return $this->id_arbitro;
    }

    
    public function setIdArbitro($id_arbitro)
    {
        $this->id_arbitro = $id_arbitro;

        return $this;
    }

    /**
     * Get the value of id_partido
     */ 
    public function getId_partido()
    {
        return $this->id_partido;
    }

    /**
     * Set the value of id_partido
     *
     * @return  self
     */ 
    public function setId_partido($id_partido)
    {
        $this->id_partido = $id_partido;

        return $this;
    }
}
?>