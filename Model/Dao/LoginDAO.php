<?php

require_once 'db_connect.php';
require_once 'Model/Usuario.php';
require_once 'Model/Dao/LoginDaoInterface.php';

class LoginDAO implements LoginDaoInterface{
    public function ingresar($usuario) {
        global $conn;
        $nombreUsuario=$usuario->getnombre();
        $passwordUsuario=$usuario->getpassword();

        $query = "SELECT * FROM usuarios WHERE nombre='$nombreUsuario' and password='$passwordUsuario'; ";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            return true;
        }

        return false;
    }

}
?>
