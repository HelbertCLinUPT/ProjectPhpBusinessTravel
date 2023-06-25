<?php

class Usuario {
    private $id;
    private $nombre;
    private $apellido;
    private $password;
    private $numeroCelular;
    private $rol;
    private $email;
    private $token;
    

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

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }


    public function getNumeroCelular() {
        return $this->numeroCelular;
    }

    public function setNumeroCelular($numeroCelular) {
        $this->numeroCelular = $numeroCelular;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getToken() {
        return $this->token;
    }

    public function setToken($token) {
        $this->id = $token;
    }


}
?>
