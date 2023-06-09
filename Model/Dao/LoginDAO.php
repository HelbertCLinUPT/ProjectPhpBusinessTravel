<?php

require_once 'db_connect.php';
require_once 'Model/Usuario.php';
require_once 'Model/Dao/LoginDaoInterface.php';

class LoginDAO implements LoginDaoInterface
{
    public function ingresar(Usuario $usuario)
    {
        global $conn;
        $emailUsuario = $usuario->getemail();
        $passwordUsuario = $usuario->getpassword();

        $query = "SELECT * FROM usuarios WHERE email = ?;";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $emailUsuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $passBD = $row['password'];
            if (password_verify($passwordUsuario, $passBD)) {
                echo "El password es correcto";
                $usuario->setId($row['id']);
                $usuario->setNombre($row['nombre']);
                $usuario->setApellido($row['apellido']);
                $usuario->setNumeroCelular($row['numeroCelular']);
                $usuario->setrol($row['rol']);

                return $usuario;
            }
        }
        return null;
    }
    public function Registrarse(Usuario $usuario){
        global $conn;
        $nombre = $usuario->getNombre();
        $apellido = $usuario->getApellido();
        $password = $usuario->getPassword();
        $numeroCelular = $usuario->getNumeroCelular();
        $rol = $usuario->getRol();
        $email = $usuario->getEmail();
    
        $query = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $query = "INSERT INTO usuarios (nombre, apellido, password, numeroCelular, rol, email) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssis", $nombre, $apellido, $hashedPassword, $numeroCelular, $rol, $email);
        $stmt->execute();
    
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function RecuperarCuenta($correo)
    {
        global $conn;

        $query = "SELECT * FROM usuarios where email='$correo; ";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            
            $asunto = 'Correo de prueba';
            $mensaje = 'Este es un correo de prueba enviado desde PHP.';
            $headers = 'From: remitente@example.com' . "\r\n" .
                'Reply-To: remitente@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            if (@mail($correo, $asunto, $mensaje, $headers)) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
}
