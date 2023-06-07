<?php

class Servicio {
    private $id;
    private $nombre;
    private $costo;
    private $fkidPaqueteturistico;
    private $fkidProveedor;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }


    public function getCosto() {
        return $this->costo;
    }

    public function setCosto($costo) {
        $this->costo = $costo;
    }

    public function getFkidPaqueteturistico() {
        return $this->fkidPaqueteturistico;
    }

    public function setFkidPaqueteturistico($fkidPaqueteturistico) {
        $this->fkidPaqueteturistico = $fkidPaqueteturistico;
    }

    public function getFkidProveedor() {
        return $this->fkidProveedor;
    }

    public function setFkidProveedor($fkidProveedor) {
        $this->fkidProveedor = $fkidProveedor;
    }
}
?>
