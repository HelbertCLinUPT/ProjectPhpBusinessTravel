<?php

require_once 'Model/Dao/ServicioDAO.php';

class ServicioController {
    private $servicioDAO;
    private $proveedores;
    private $paqueteturisticos;

    public function __construct() {
        $this->servicioDAO = new ServicioDAO();
    }

    public function index() {
        $servicios = $this->servicioDAO->getAllServicios();
        include 'View/Servicio/index.php';
    }

    public function add($proveedores, $paqueteturisticos) {

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
            $this->proveedores = $proveedores;
            $this->paqueteturisticos = $paqueteturisticos;
            include 'View/Servicio/add.php';
        }
    }

    public function edit($id,$proveedores, $paqueteturisticos) {
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
                $this->proveedores = $proveedores;
                $this->paqueteturisticos = $paqueteturisticos;
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
