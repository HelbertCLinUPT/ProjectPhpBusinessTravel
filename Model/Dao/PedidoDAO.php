<?php

require_once 'db_connect.php';
require_once 'Model/Pedido.php';
require_once 'PedidoDAOInterface.php';

class PedidoDao implements PedidoDaoInterface {
    public function getAllPedido() {
        global $conn;

        $query = "SELECT * FROM pedidos";
        $result = $conn->query($query);

        $pedidos = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pedido = new Pedido();
                $pedido->setId($row['id']);
                $pedido->setFechaSolicitud($row['fechasolicitud']);
                $pedido->setFechaDestino($row['fechadestino']);
                $pedido->setCosto($row['costo']);
                $pedido->setDestino($row['destino']);
                $pedido->setFkIdUsuario($row['fkidusuario']);

                $pedidos[] = $pedido;
            }
        }

        return $pedidos;
    }

    public function addPedido($pedido) {
        global $conn;

        $fechaSolicitud = $pedido->getFechaSolicitud();
        $fechaDestino = $pedido->getFechaDestino();
        $costo = $pedido->getCosto();
        $destino = $pedido->getDestino();
        $fkIdUsuario = $pedido->getFkIdUsuario();

        $query = "INSERT INTO pedidos (fechasolicitud, fechadestino, costo, destino, fkidusuario) VALUES ('$fechaSolicitud', '$fechaDestino', '$costo', '$destino', '$fkIdUsuario')";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getPedidoById($id) {
        global $conn;

        $query = "SELECT * FROM pedidos WHERE id='$id'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $pedido = new Pedido();
            $pedido->setId($row['id']);
            $pedido->setFechaSolicitud($row['fechasolicitud']);
            $pedido->setFechaDestino($row['fechadestino']);
            $pedido->setCosto($row['costo']);
            $pedido->setDestino($row['destino']);
            $pedido->setFkIdUsuario($row['fkidusuario']);

            return $pedido;
        }

        return null;
    }

    public function updatePedido($pedido) {
        global $conn;

        $id = $pedido->getId();
        $fechaSolicitud = $pedido->getFechaSolicitud();
        $fechaDestino = $pedido->getFechaDestino();
        $costo = $pedido->getCosto();
        $destino = $pedido->getDestino();
        $fkIdUsuario = $pedido->getFkIdUsuario();

        $query = "UPDATE pedidos SET fechasolicitud='$fechaSolicitud', fechadestino='$fechaDestino', costo='$costo', destino='$destino', fkidusuario='$fkIdUsuario' WHERE id='$id'";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePedido($id) {
        global $conn;

        $query = "DELETE FROM pedidos WHERE id='$id'";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>
