<?php

class Servicio {
    private $id;
    private $costo;
    private $fkidProveedor;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCosto() {
        return $this->costo;
    }

    public function setCosto($costo) {
        $this->costo = $costo;
    }

    public function getFkidProveedor() {
        return $this->fkidProveedor;
    }

    public function setFkidProveedor($fkidProveedor) {
        $this->fkidProveedor = $fkidProveedor;
    }
}
?>
