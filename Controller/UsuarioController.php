<?php

require_once 'Model/Dao/UsuarioDAO.php';

class UsuarioController
{
    private $usuarioDAO;

    public function __construct()
    {
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function index()
    {
        $usuarios = $this->usuarioDAO->getAllUsuarios();
        include 'View/Usuario/index.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellido($_POST['apellido']);
            $usuario->setNumeroCelular($_POST['numeroCelular']);
            $usuario->setRol($_POST['rol']);
            $usuario->setPassword($_POST['password']);
            $usuario->setEmail($_POST['email']);


            if ($this->usuarioDAO->addUsuario($usuario)) {
                session_start();

                if (@$_SESSION['rol'] == 2) {
                    header('Location: MainController.php?action=usuario-index');
                } else {
                    header('Location: MainController.php?action=login-index');
                }
            } else {
                echo "Error adding usuario.";
            }
        } else {
            include 'View/Usuario/add.php';
        }
    }


    public function edit($id)
    {
        $usuario = $this->usuarioDAO->getUsuarioById($id);
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellido($_POST['apellido']);
            $usuario->setNumeroCelular($_POST['numeroCelular']);
            $usuario->setPassword($_POST['password']);
            $usuario->setRol($_POST['rol']);
            $usuario->setEmail($_POST['email']);

            if ($this->usuarioDAO->updateUsuario($usuario)) {
                header('Location: MainController.php?action=usuario-index');
            } else {
                echo 'Error updating the usuario.';
            }
        } else {
            include 'View/Usuario/edit.php';
        }
    }

    public function delete($id)
    {
        if ($this->usuarioDAO->deleteUsuario($id)) {
            header('Location: MainController.php?action=usuario-index');
        } else {
            echo 'Error deleting the usuario.';
        }
    }
}
