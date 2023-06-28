<?php

require_once 'Model/Dao/PedidoDAO.php';

class PedidoController {
    private $pedidoDAO;

    public function __construct() {
        $this->pedidoDAO = new PedidoDao();
    }

    public function index() {
        $pedidos = $this->pedidoDAO->getAllPedido();
        include 'View/Pedido/index.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fechaSolicitud = $_POST['fechaSolicitud'];
            $fechaDestino = $_POST['fechaDestino'];
            $costo = $_POST['costo'];
            $destino = $_POST['destino'];
            $fkIdUsuario = $_POST['fkIdUsuario'];

            $pedido = new Pedido();
            $pedido->setFechaSolicitud($fechaSolicitud);
            $pedido->setFechaDestino($fechaDestino);
            $pedido->setCosto($costo);
            $pedido->setDestino($destino);
            $pedido->setFkIdUsuario($fkIdUsuario);

            if ($this->pedidoDAO->addPedido($pedido)) {
                header('Location: MainController.php?action=pedido-index');
            } else {
                echo 'Error adding the pedido.';
            }
        } else {
            include 'View/Pedido/add.php';
        }
    }

    public function userAdd() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fechaSolicitud = $_POST['fechaSolicitud'];
            $destino = $_POST['destino'];
            $fkIdUsuario = $_POST['id'];

            $pedido = new Pedido();

            $pedido->setFechaSolicitud($fechaSolicitud);
            $pedido->setFechaDestino('2020-01-01');
            $pedido->setCosto(0);
            $pedido->setDestino($destino);
            $pedido->setFkIdUsuario($fkIdUsuario);

            if ($this->pedidoDAO->addPedido($pedido)) {
                                
                header('Location: MainController.php?action=page-index');
            } else {
                echo 'Error adding the pedido.';
            }
        } else {
            include 'View/Pedido/add.php';
        }
    }


    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fechaSolicitud = $_POST['fechaSolicitud'];
            $fechaDestino = $_POST['fechaDestino'];
            $costo = $_POST['costo'];
            $destino = $_POST['destino'];
            $fkIdUsuario = $_POST['fkIdUsuario'];

            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setFechaSolicitud($fechaSolicitud);
            $pedido->setFechaDestino($fechaDestino);
            $pedido->setCosto($costo);
            $pedido->setDestino($destino);
            $pedido->setFkIdUsuario($fkIdUsuario);

            if ($this->pedidoDAO->updatePedido($pedido)) {
                header('Location: MainController.php?action=pedido-index');
                
            } else {
                echo 'Error updating the pedido.';
            }
        } else {
            $pedido = $this->pedidoDAO->getPedidoById($id);
            if ($pedido) {
                include 'View/Pedido/edit.php';
            } else {
                echo 'Pedido not found.';
            }
        }
    }

    public function delete($id) {
        if ($this->pedidoDAO->deletePedido($id)) {
            header('Location: MainController.php?action=pedido-index');
        } else {
            echo 'Error deleting the pedido.';
        }
    }

    public function indexstadistic() {
        $pedidos = $this->pedidoDAO->getAllPedido();
        include 'View/index.php';
    }
}
?>
