<?php

require_once 'Model/Dao/LoginDAO.php';

class LoginController
{
    private $LoginDAO;

    public function __construct()
    {
        $this->LoginDAO = new LoginDAO();
    }

    public function index()
    {
        include("View/Pagina/login.php");
    }

    public function ingresar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = new Usuario();
            $usuario->setEmail($_POST['Usuario']);
            $usuario->setpassword($_POST['Password']);

            $usuario = $this->LoginDAO->ingresar($usuario);

            if (isset($usuario)) {
                $_SESSION['id'] = $usuario->getId();
                $_SESSION['nombre'] = $usuario->getNombre();
                $_SESSION['apellido'] = $usuario->getApellido();
                $_SESSION['numerocelular'] = $usuario->getNumeroCelular();
                $_SESSION['password'] = $usuario->getPassword();
                $_SESSION['rol'] = $usuario->getRol();
                $_SESSION['email'] = $usuario->getEmail();

                if ($_SESSION['rol'] == 2) {
                    header('Location: MainController.php?action=admin-index');
                } else {
                    header('Location: MainController.php?action=main-index');
                }
            } else {
                //echo "Error ingresando.";
                include 'View/Pagina/login.php';
            }
        } else
            include 'View/Pagina/login.php';
    }
    public function registrarse()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellido($_POST['apellido']);
            $usuario->setPassword($_POST['password']);
            $usuario->setNumeroCelular($_POST['numeroCelular']);
            $usuario->setRol($_POST['rol']);
            $usuario->setEmail($_POST['email']);

            $registrado = $this->LoginDAO->Registrarse($usuario);

            if ($registrado) {
                header('Location: MainController.php?action=login-ingresar');
            } else {

                echo "Error en el registro.";
            }
        } else {
            include 'View/Pagina/register.php';
        }
    }

    public function RecuperarCuenta()
    {
        include("View/RecuperarCuenta/index.php");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo = $_POST['correo'];

            if ($this->LoginDAO->RecuperarCuenta($correo)){
                $_SESSION['correo']=$_POST['correo'];
                include('View/Message/MessageConfirm.php');
            }
            else
                include('View/Message/MessageError.php');
        }
    }

    public function ReestablecerPassword()
    {
        include("View/RecuperarCuenta/CambiarPassword.php");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $codigo = $_POST['codigo'];
            $password = $_POST['password'];

            if ($this->LoginDAO->ReestablecerPassword($codigo,$password)) {
                include('View/Message/MessageConfirm.php');
            } else {
                include('View/Message/MessageError.php');
            }
        } 
    }



    public function salir()
    {
        session_destroy();
        ?>
        <script>
          localStorage.setItem('resultado-consulta', '');
          localStorage.setItem('resultado-mensajes', '');
        </script>
        <?php
        include 'View/Pagina/login.php';
    }
}
