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
            $usuario->setNombre($_POST['Usuario']);
            $usuario->setpassword($_POST['Password']);

            if ($this->LoginDAO->ingresar($usuario)) {
                session_start();
                $_SESSION['nombre']=$_POST['Usuario'];

                header('Location: MainController.php?action=admin-index');
            } else {
                echo "Error ingresando.";
            }
        } else
            include 'View/Pagina/login.php';
    }
    
}
?>