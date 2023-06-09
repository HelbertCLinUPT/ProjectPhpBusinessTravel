<?php

require_once 'Model/Dao/ProveedorDAO.php';

class ProveedorController {
    private $proveedorDAO;

    public function __construct() {
        $this->proveedorDAO = new ProveedorDAO();
    }

    public function index() {
        $proveedores = $this->proveedorDAO->getAllProveedores();
        include 'View/Proveedor/index.php';
    }
    public function listar() {
        return $this->proveedorDAO->getAllProveedores();
    }
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ruc = $_POST['ruc'];
            $nombre = $_POST['nombre'];
            $pais = $_POST['pais'];

            $proveedor = new Proveedor();
            $proveedor->setRuc($ruc);
            $proveedor->setNombre($nombre);
            $proveedor->setPais($pais);

            if ($this->proveedorDAO->addProveedor($proveedor)) {
                header('Location: MainController.php?action=proveedor-index');
            } else {
                echo 'Error adding the proveedor.';
            }
        } else {
            include 'View/Proveedor/add.php';
        }
    }

    public function edit($ruc) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $pais = $_POST['pais'];

            $proveedor = new Proveedor();
            $proveedor->setRuc($ruc);
            $proveedor->setNombre($nombre);
            $proveedor->setPais($pais);

            if ($this->proveedorDAO->updateProveedor($proveedor)) {
                header('Location: MainController.php?action=proveedor-index');
                
            } else {
                echo 'Error updating the proveedor.';
            }
        } else {
            $proveedor = $this->proveedorDAO->getProveedorById($ruc);
            if ($proveedor) {
                include 'View/Proveedor/edit.php';
            } else {
                echo 'Proveedor not found.';
            }
        }
    }

    public function delete($ruc) {
        if ($this->proveedorDAO->deleteProveedor($ruc)) {
            header('Location: MainController.php?action=proveedor-index');
        } else {
            echo 'Error deleting the proveedor.';
        }
    }
}
?>
