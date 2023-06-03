<?php

require_once 'db_connect.php';
require_once 'Model/Usuario.php';
require_once 'Model/Dao/UsuarioDAOInterface.php';

class UsuarioDAO implements UsuarioDAOInterface{
    public function getAllUsuarios() {
        global $conn;
        $usuarios = [];

        $query = "SELECT * FROM usuarios";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $usuario = new Usuario();
                $usuario->setId($row['id']);
                $usuario->setNombre($row['nombre']);
                $usuario->setApellido($row['apellido']);
                $usuario->setNumeroCelular($row['numeroCelular']);
                $usuario->setRol($row['rol']);
                $usuario->setEmail($row['email']);

                $usuarios[] = $usuario;
            }
        }

        return $usuarios;
    }

    public function addUsuario($usuario) {
        global $conn;

        $nombre = $usuario->getNombre();
        $apellido = $usuario->getApellido();
        $numeroCelular = $usuario->getNumeroCelular();
        $rol = $usuario->getRol();
        $password = $usuario->getPassword();
        $email=$usuario->getEmail();

        $query = "INSERT INTO usuarios (nombre, apellido, numeroCelular, rol, password,email) VALUES ('$nombre', '$apellido', '$numeroCelular', '$rol','$password','$email')";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsuarioById($id) {
        global $conn;

        $query = "SELECT * FROM usuarios WHERE id=$id";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $usuario = new Usuario();
            $usuario->setId($row['id']);
            $usuario->setNombre($row['nombre']);
            $usuario->setApellido($row['apellido']);
            $usuario->setNumeroCelular($row['numeroCelular']);
            $usuario->setRol($row['rol']);
            $usuario->setEmail($row['email']);
            return $usuario;
        } else {
            return null;
        }
    }

    public function updateUsuario($usuario) {
        global $conn;

        $id = $usuario->getId();
        $nombre = $usuario->getNombre();
        $apellido = $usuario->getApellido();
        $numeroCelular = $usuario->getNumeroCelular();
        $password = $usuario->getPassword();
        $rol = $usuario->getRol();
        $email = $usuario->getEmail();


        $query = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', numeroCelular='$numeroCelular', rol='$rol' , password='$password' , email='$email' WHERE id=$id";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUsuario($id) {
        global $conn;

        $query = "DELETE FROM usuarios WHERE id=$id";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>
