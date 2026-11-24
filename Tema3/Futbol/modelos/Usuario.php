<?php
//Representa la tabla Usuarios
class Usuario{
    private $id, $dni, $nombre, $perfil, $equipo;

    function __construct($id, $dni, $nombre, $perfil, $equipo){
        $this->id=$id;    
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->perfil=$perfil;
        $this->equipo=$equipo;
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
     */
    public function setDni($dni): self
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
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of perfil
     */ 
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Set the value of perfil
     *
     * @return  self
     */ 
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;

        return $this;
    }

    /**
     * Get the value of equipo
     */ 
    public function getEquipo()
    {
        return $this->equipo;
    }

    /**
     * Set the value of equipo
     *
     * @return  self
     */ 
    public function setEquipo($equipo)
    {
        $this->equipo = $equipo;

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