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
                session_start();
                $_SESSION['id'] = $usuario->getId();
                $_SESSION['nombre'] = $usuario->getNombre();
                $_SESSION['apellido']= $usuario->getApellido();
                $_SESSION['numerocelular']= $usuario->getNumeroCelular();
                $_SESSION['password'] = $usuario->getPassword();
                $_SESSION['rol'] = $usuario->getRol();
                $_SESSION['email'] = $usuario->getEmail();

                if($_SESSION['rol']==2){
                    header('Location: MainController.php?action=admin-index');
                }else{
                    header('Location: MainController.php?action=main-index');
                }
               

            } else {
                //echo "Error ingresando.";
                include 'View/Pagina/login.php';
            }
        } else
            include 'View/Pagina/login.php';
    }

    public function salir()
    {
        session_start();
        session_destroy();
        include 'View/Pagina/login.php';
    }
}
