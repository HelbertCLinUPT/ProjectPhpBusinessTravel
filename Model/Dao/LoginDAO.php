<?php

require_once 'db_connect.php';
require_once 'Model/Usuario.php';
require_once 'Model/Dao/LoginDaoInterface.php';

class LoginDAO implements LoginDaoInterface{
    public function ingresar(Usuario $usuario) {
        global $conn;
        $emailUsuario=$usuario->getemail();
        $passwordUsuario=$usuario->getpassword();

        $query = "SELECT * FROM usuarios WHERE email='$emailUsuario' and password='$passwordUsuario'; ";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $usuario->setId($row['id']);
            $usuario->setNombre($row['nombre']);
            $usuario->setApellido($row['apellido']);
            $usuario->setNumeroCelular($row['numeroCelular']);
            $usuario->setrol($row['rol']);

            return $usuario;
        }

        return null;
    }

}
?>
