<?php

class PaqueteTuristico
{
    private $id;
    private $nombre;
    private $direccion;
    private $duracion;
    private $imagen;
    private $precitototal;


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

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }

    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }
    
    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getPrecioTotal()
    {
        return $this->precitototal;
    }

    public function setPrecioTotal($precitototal)
    {
        $this->precitototal = $precitototal;
    }

}
