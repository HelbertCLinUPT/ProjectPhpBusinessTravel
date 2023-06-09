<?php

require_once 'db_connect.php';
require_once 'Model/Servicio.php';
require_once 'Model/Dao/ServicioDAOInterface.php';

class ServicioDAO implements ServicioDAOInterface {
    public function getAllServicios() {
        global $conn;

        $query = "
        SELECT s.id,s.nombre,s.costo,p.nombre AS fkidPaqueteTuristico,pro.nombre AS fkidProveedor
        FROM servicios AS s
        JOIN paqueteturistico AS p
        ON s.fkidPaqueteTuristico = p.id
        JOIN proveedores AS pro
        ON s.fkidProveedor = pro.ruc";
        $result = $conn->query($query);

        $servicios = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $servicio = new Servicio();
                $servicio->setId($row['id']);
                $servicio->setNombre($row['nombre']);
                $servicio->setCosto($row['costo']);
                $servicio->setFkidPaqueteturistico($row['fkidPaqueteTuristico']);
                $servicio->setFkidProveedor($row['fkidProveedor']);

                $servicios[] = $servicio;
            }
        }

        return $servicios;
    }

    public function addServicio($servicio) {
        global $conn;

        $nombre = $servicio->getNombre();
        $costo = $servicio->getCosto();
        $fkidPaqueteturistico = $servicio->getFkidPaqueteturistico();
        $fkidProveedor = $servicio->getFkidProveedor();

        $query = "INSERT INTO servicios (nombre,costo,fkidPaqueteTuristico, fkidProveedor) VALUES ('$nombre','$costo','$fkidPaqueteturistico', '$fkidProveedor')";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getServicioById($id) {
        global $conn;

        $query = "SELECT * FROM servicios WHERE id=$id";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $servicio = new Servicio();
            $servicio->setId($row['id']);
            $servicio->setNombre($row['nombre']);
            $servicio->setCosto($row['costo']);
            $servicio->setFkidPaqueteturistico($row['fkidPaqueteTuristico']);
            $servicio->setFkidProveedor($row['fkidProveedor']);
            return $servicio;
        }

        return null;
    }

    public function updateServicio($servicio) {
        global $conn;

        $id = $servicio->getId();
        $nombre = $servicio->getNombre();
        $costo = $servicio->getCosto();
        $fkidPaqueteturistico = $servicio->getFkidPaqueteturistico();
        $fkidProveedor = $servicio->getFkidProveedor();

        $query = "UPDATE servicios SET nombre='$nombre', costo='$costo', fkidPaqueteTuristico='$fkidPaqueteturistico', fkidProveedor='$fkidProveedor' WHERE id=$id";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteServicio($id) {
        global $conn;

        $query = "DELETE FROM servicios WHERE id=$id";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>
