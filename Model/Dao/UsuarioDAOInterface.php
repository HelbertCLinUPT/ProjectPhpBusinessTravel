<?php

interface UsuarioDAOInterface {
    public function getAllUsuarios();

    public function addUsuario($usuario);

    public function getUsuarioById($id);

    public function updateUsuario($usuario);

    public function deleteUsuario($id);
}
?>
