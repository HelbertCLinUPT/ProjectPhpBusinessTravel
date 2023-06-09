<?php

require_once 'Model/Dao/ServicioDAO.php';
require_once 'Model/Dao/ProveedorDAO.php';
require_once 'Model/Dao/PaqueteTuristicoDAO.php';

class ServicioController {
    private $servicioDAO;
    private $proveedorDAO;
    private $paqueteTuristicoDAO;


    public function __construct() {
        $this->servicioDAO = new ServicioDAO();
        $this->proveedorDAO = new ProveedorDAO();
        $this->paqueteTuristicoDAO = new PaqueteTuristicoDAO();
    }

    public function index() {
        $servicios = $this->servicioDAO->getAllServicios();
        foreach($servicios as $servicio):
            $proveedor=$this->proveedorDAO->getProveedorById($servicio->getFkidProveedor());
            $paquete=$this->paqueteTuristicoDAO->getPaqueteTuristicoById($servicio->getFkidPaqueteturistico());

            $servicio->setFkidProveedor($proveedor->getNombre());
            $servicio->setFkidPaqueteturistico($paquete->getNombre());


        endforeach;
        include 'View/Servicio/index.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $costo = $_POST['costo'];
            $fkidPaqueteturistico= $_POST['fkidPaqueteturistico'];
            $fkidProveedor = $_POST['fkidProveedor'];

            $servicio = new Servicio();
            $servicio->setCosto($costo);
            $servicio->setnombre($nombre);
            $servicio->setFkidPaqueteturistico($fkidPaqueteturistico);
            $servicio->setFkidProveedor($fkidProveedor);

            if ($this->servicioDAO->addServicio($servicio)) {
                header('Location: MainController.php?action=servicio-index');
            } else {
                echo 'Error adding the servicio.';
            }
        } else {
            include 'View/Servicio/add.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $nombre = $_POST['nombre'];
            $costo = $_POST['costo'];
            $fkidPaqueteturistico= $_POST['fkidPaqueteturistico'];
            $fkidProveedor = $_POST['fkidProveedor'];

            $servicio = new Servicio();
            $servicio->setId($id);
            $servicio->setCosto($costo);
            $servicio->setnombre($nombre);
            $servicio->setFkidPaqueteturistico($fkidPaqueteturistico);
            $servicio->setFkidProveedor($fkidProveedor);

            if ($this->servicioDAO->updateServicio($servicio)) {
                header('Location: MainController.php?action=servicio-index');
            } else {
                echo 'Error updating the servicio.';
            }
        } else {
            $servicio = $this->servicioDAO->getServicioById($id);
            if ($servicio) {
                include 'View/Servicio/edit.php';
            } else {
                echo 'Servicio not found.';
            }
        }
    }

    public function delete($id) {
        if ($this->servicioDAO->deleteServicio($id)) {
            header('Location: MainController.php?action=servicio-index');
        } else {
            echo 'Error deleting the servicio.';
        }
    }
}
?>
