<?php
class PaqueteTuristico
{
    private $id;
    private $nombre;
    private $direccion;
    private $duracion;
    private $imagen;
    private $preciototal;
    private $servicios;
    private $proveedor; 

   
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
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
        return $this->preciototal;
    }

    public function setPrecioTotal($preciototal)
    {
        $this->preciototal = $preciototal;
    }

    public function getServicios()
    {
        return $this->servicios;
    }

    public function setServicios($servicios)
    {
        $this->servicios = $servicios;
    }

    public function getProveedor()
    {
        return $this->proveedor;
    }

    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;
    }
}
