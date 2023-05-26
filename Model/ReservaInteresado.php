<?php

class ReservaInteresado
{
    private $id;
    private $nombre;
    private $precioTotal;
    private $fkidUsuario;
    private $fkidServicio;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id=$id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    

    public function getPrecioTotal()
    {
        return $this->precioTotal;
    }

    public function setPrecioTotal($precioTotal)
    {
        $this->precioTotal = $precioTotal;
    }

    public function getFkidUsuario()
    {
        return $this->fkidUsuario;
    }

    public function setFkidUsuario($fkidUsuario)
    {
        $this->fkidUsuario = $fkidUsuario;
    }

    public function getFkidServicio()
    {
        return $this->fkidServicio;
    }

    public function setFkidServicio($fkidServicio)
    {
        $this->fkidServicio = $fkidServicio;
    }
}
