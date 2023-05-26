<?php

require_once 'db_connect.php';
require_once 'Model/Proveedor.php';
require_once 'Model/Dao/ProveedorDAOInterface.php';

class ProveedorDAO implements ProveedorDAOInterface {
    public function getAllProveedores() {
        global $conn;

        $query = "SELECT * FROM proveedores";
        $result = $conn->query($query);

        $proveedores = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $proveedor = new Proveedor();
                $proveedor->setRuc($row['ruc']);
                $proveedor->setNombre($row['nombre']);
                $proveedor->setPais($row['pais']);

                $proveedores[] = $proveedor;
            }
        }

        return $proveedores;
    }

    public function addProveedor($proveedor) {
        global $conn;

        $ruc = $proveedor->getRuc();
        $nombre = $proveedor->getNombre();
        $pais = $proveedor->getPais();

        $query = "INSERT INTO proveedores (ruc, nombre, pais) VALUES ('$ruc', '$nombre', '$pais')";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getProveedorById($ruc) {
        global $conn;

        $query = "SELECT * FROM proveedores WHERE ruc='$ruc'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $proveedor = new Proveedor();
            $proveedor->setRuc($row['ruc']);
            $proveedor->setNombre($row['nombre']);
            $proveedor->setPais($row['pais']);

            return $proveedor;
        }

        return null;
    }

    public function updateProveedor($proveedor) {
        global $conn;

        $ruc = $proveedor->getRuc();
        $nombre = $proveedor->getNombre();
        $pais = $proveedor->getPais();

        $query = "UPDATE proveedores SET nombre='$nombre', pais='$pais' WHERE ruc='$ruc' ;";
        
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProveedor($ruc) {
        global $conn;

        $query = "DELETE FROM proveedores WHERE ruc='$ruc'";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>