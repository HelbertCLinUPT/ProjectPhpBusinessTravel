<?php

require_once 'Model/ReservaInteresado.php';
require_once 'Model/Dao/ReservaInteresadoDAO.php';

class ReservaInteresadoController {
    private $reservaInteresadoDao;

    public function __construct() {
        $this->reservaInteresadoDao = new reservaInteresadoDAO();
    }

    public function index() {
        $reservainteresados = $this->reservaInteresadoDao->getAllReservaInteresados();
        include 'View/ReservaInteresado/index.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $precioTotal = $_POST['preciototal'];
            $fkidUsuario = $_POST['fkidusuario'];
            $fkidServicio = $_POST['fkidservicio'];

            $reservaInteresado = new ReservaInteresado();
            $reservaInteresado->setNombre($nombre);
            $reservaInteresado->setPrecioTotal($precioTotal);
            $reservaInteresado->setFkIdUsuario($fkidUsuario);
            $reservaInteresado->setFkIdServicio($fkidServicio);

            if ($this->reservaInteresadoDao->addReservaInteresado($reservaInteresado)) {
                header('Location: MainController.php?action=interesado-index');
            } else {
                echo 'Error adding the ReservaInteresado.';
            }
        } else {
            include 'View/ReservaInteresado/add.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $precioTotal = $_POST['preciototal'];
            $fkidUsuario = $_POST['fkidusuario'];
            $fkidServicio = $_POST['fkidservicio'];

            $reservaInteresado = new ReservaInteresado();
            $reservaInteresado->setId($id);
            $reservaInteresado->setNombre($nombre);
            $reservaInteresado->setPrecioTotal($precioTotal);
            $reservaInteresado->setFkIdUsuario($fkidUsuario);
            $reservaInteresado->setFkIdServicio($fkidServicio);

            if ($this->reservaInteresadoDao->updateReservaInteresado($reservaInteresado)) {
                header('Location: MainController.php?action=interesado-index');
                
            } else {
                echo 'Error updating the ReservaInteresado.';
            }
        } else {
            $reservaInteresado = $this->reservaInteresadoDao->getReservaInteresadoById($id);
            if ($reservaInteresado) {
                include 'View/ReservaInteresado/edit.php';
            } else {
                echo 'ReservaInteresado not found.';
            }
        }
    }

    public function delete($id) {
        if ($this->reservaInteresadoDao->deleteReservaInteresado($id)) {
            header('Location: MainController.php?action=interesado-index');
        } else {
            echo 'Error deleting the ReservaInteresado.';
        }
    }
}
?>
