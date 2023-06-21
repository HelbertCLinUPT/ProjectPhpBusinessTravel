<?php

require_once 'db_connect.php';
require_once 'Model/ReservaInteresado.php';
require_once 'Model/Dao/ReservaInteresadoDAOInterface.php';

class ReservaInteresadoDAO implements ReservaInteresadoDAOInterface {
    public function getAllReservaInteresados() {
        global $conn;

        //$query = "SELECT * FROM reservainteresados";


        $query = "
        SELECT s.id,s.nombre,s.precioTotal,p.nombre AS fkidServicio,concat(usu.nombre,' ',usu.apellido) AS fkidUsuario
        FROM reservainteresados AS s
        JOIN paqueteturistico AS p
        ON s.fkidServicio = p.id
        JOIN usuarios AS usu
        ON s.fkidUsuario = usu.id";


        $result = $conn->query($query);

        $reservainteresados = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $reservainter = new ReservaInteresado();
                $reservainter->setId($row['id']);
                $reservainter->setNombre($row['nombre']);
                $reservainter->setprecioTotal($row['precioTotal']);
                $reservainter->setFkidUsuario($row['fkidUsuario']);
                $reservainter->setFkidServicio($row['fkidServicio']);

                $reservainteresados[] = $reservainter;
            }
        }

        return $reservainteresados;
    }

    public function addReservaInteresado($reservainter) {
        global $conn;

        $nombre = $reservainter->getNombre();
        $precioTotal = $reservainter->getprecioTotal();
        $fkidUsuario = $reservainter->getFkidUsuario();
        $fkidServicio = $reservainter->getFkidServicio();

        $query = "INSERT INTO reservainteresados (nombre, precioTotal, fkidUsuario, fkidServicio) VALUES ('$nombre', '$precioTotal', '$fkidUsuario', '$fkidServicio')";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getReservaInteresadoById($id) {
        global $conn;

        $query = "SELECT * FROM reservainteresados WHERE id='$id'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $reservainter = new ReservaInteresado();
            $reservainter->setId($row['id']);
            $reservainter->setNombre($row['nombre']);
            $reservainter->setprecioTotal($row['precioTotal']);
            $reservainter->setFkidUsuario($row['fkidUsuario']);
            $reservainter->setFkidServicio($row['fkidServicio']);

            return $reservainter;
        }

        return null;
    }

    public function updateReservaInteresado($reservainter) {
        global $conn;

        $id = $reservainter->getId();
        $nombre = $reservainter->getNombre();
        $precioTotal = $reservainter->getprecioTotal();
        $fkidUsuario = $reservainter->getFkidUsuario();
        $fkidServicio = $reservainter->getFkidServicio();

        $query = "UPDATE reservainteresados SET nombre='$nombre', precioTotal=$precioTotal, fkidUsuario='$fkidUsuario', fkidServicio='$fkidServicio' WHERE id='$id'";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteReservaInteresado($id) {
        global $conn;

        $query = "DELETE FROM reservainteresados WHERE id='$id'";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>
