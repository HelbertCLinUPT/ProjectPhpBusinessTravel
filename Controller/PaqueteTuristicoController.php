<?php

require_once 'Model/PaqueteTuristico.php';
require_once 'Model/Dao/PaqueteTuristicoDAO.php';

class PaqueteTuristicoController {
    private $paqueteTuristicoDao;

    public function __construct() {
        $this->paqueteTuristicoDao = new PaqueteTuristicoDAO();
    }

    public function index() {
        $paqueteturisticos = $this->paqueteTuristicoDao->getAllPaqueteTuristicos();
        include 'View/PaqueteTuristico/index.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $duracion = $_POST['duracion'];

            $paqueteTuristico = new PaqueteTuristico();
            $paqueteTuristico->setNombre($nombre);
            $paqueteTuristico->setDireccion($direccion);
            $paqueteTuristico->setDuracion($duracion);

            if ($this->paqueteTuristicoDao->addPaqueteTuristico($paqueteTuristico)) {
                header('Location: MainController.php?action=paquete-index');
            } else {
                echo 'Error adding the PaqueteTuristico.';
            }
        } else {
            include 'View/PaqueteTuristico/add.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $duracion = $_POST['duracion'];

            $paqueteTuristico = new PaqueteTuristico();
            $paqueteTuristico->setId($id);
            $paqueteTuristico->setNombre($nombre);
            $paqueteTuristico->setDireccion($direccion);
            $paqueteTuristico->setDuracion($duracion);

            if ($this->paqueteTuristicoDao->updatePaqueteTuristico($paqueteTuristico)) {
                header('Location: MainController.php?action=paquete-index');
            } else {
                echo 'Error updating the PaqueteTuristico.';
            }
        } else {
            $paqueteTuristico = $this->paqueteTuristicoDao->getPaqueteTuristicoById($id);
            if ($paqueteTuristico) {
                include 'View/PaqueteTuristico/edit.php';
            } else {
                echo 'PaqueteTuristico not found.';
            }
        }
    }

    public function delete($id) {
        if ($this->paqueteTuristicoDao->deletePaqueteTuristico($id)) {
            header('Location: MainController.php?action=paquete-index');
        } else {
            echo 'Error deleting the PaqueteTuristico.';
        }
    }
}
?>
