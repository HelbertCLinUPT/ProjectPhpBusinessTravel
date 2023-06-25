<?php

require_once 'db_connect.php';
require_once 'Model/Usuario.php';
require_once 'Model/Dao/LoginDaoInterface.php';
require 'vendor/autoload.php';


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

    public function RecuperarCuenta($correo)
    {
        global $conn;
        $query = "SELECT * FROM usuarios where email='$correo'; ";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'hc2020067571@virtual.upt.pe';
            $mail->Password = 'meqndxdfrbdzrgei';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('hc2020067571@virtual.upt.pe', 'Bussinenss');
            $mail->addAddress($correo, 'Helbert');
            $mail->isHTML(true);
            $mail->Subject = 'Asunto del correo';
            $mail->Body = 'Contenido del correo en formato HTML';
            $mail->AltBody = 'Contenido del correo en texto plano (opcional)';
            if ($mail->send())
                return true;
            else
                return false;
        }
        return false;
    }

    public function Registrarse(Usuario $usuario)
    {
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
}
