<?php

class Pedido {
    private $id;
    private $fechaSolicitud;
    private $fechaDestino;
    private $costo;
    private $destino;
    private $fkIdUsuario;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFechaSolicitud() {
        return $this->fechaSolicitud;
    }

    public function setFechaSolicitud($fechaSolicitud) {
        $this->fechaSolicitud = $fechaSolicitud;
    }

    public function getFechaDestino() {
        return $this->fechaDestino;
    }

    public function setFechaDestino($fechaDestino) {
        $this->fechaDestino = $fechaDestino;
    }

    public function getCosto() {
        return $this->costo;
    }

    public function setCosto($costo) {
        $this->costo = $costo;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function getFkIdUsuario() {
        return $this->fkIdUsuario;
    }

    public function setFkIdUsuario($fkIdUsuario) {
        $this->fkIdUsuario = $fkIdUsuario;
    }
}
