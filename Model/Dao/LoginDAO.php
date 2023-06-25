<?php

require_once 'db_connect.php';
require_once 'Model/Usuario.php';
require_once 'Model/Dao/LoginDaoInterface.php';
require_once 'Model/Dao/UsuarioDAO.php';
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
    public function ReestablecerPassword($codigo, $password)
    {
        global $conn;
        $query = "SELECT * FROM usuarios where token='$codigo'; ";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $usuariodao = new UsuarioDAO;
            $usuario = $usuariodao->getUsuarioById($row['id']);
            $usuario->setPassword($password);
            return  $usuariodao->updateUsuario($usuario);

        }
        return false;
    }

    public function RecuperarCuenta($correo)
    {
        global $conn;
        $query = "SELECT * FROM usuarios where email='$correo'; ";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $token = $row['token'];
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'hc2020067571@virtual.upt.pe';
            $mail->Password = 'meqndxdfrbdzrgei';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('hc2020067571@virtual.upt.pe', 'Bussinenss');
            $mail->addAddress($correo, 'Usuario');
            $mail->isHTML(true);
            $mail->Subject = 'Recuperacion de cuenta BussinessTravel';

            $mail->Body = 'hola, nos comunicamos con usted para decirle que la reacctivacion de su cuenta se encuentra en proceso con siguiente token ' . $token . ', porfavor confirmenos al siguiente link: https://app.helbert.info/MainController.php?action=login-forgot';
            //$mail->AltBody = 'Contenido del correo en texto plano (opcional)';

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
        $token = substr(uniqid(), -8);

        $query = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuarios (nombre, apellido, password, numeroCelular, rol, email,token) VALUES (?, ?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssiss", $nombre, $apellido, $hashedPassword, $numeroCelular, $rol, $email,$token);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
