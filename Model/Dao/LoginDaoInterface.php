<?php

interface LoginDaoInterface {
    public function Ingresar(Usuario $usuario);
    public function Registrarse(Usuario $usuario);
}
?>
