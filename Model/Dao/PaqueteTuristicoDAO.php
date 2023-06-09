<?php

require_once 'db_connect.php';
require_once 'Model/PaqueteTuristico.php';
require_once 'Model/Dao/PaqueteTuristicoDaoInterface.php';

class PaqueteTuristicoDAO implements PaqueteTuristicoDaoInterface
{
    public function getAllPaqueteTuristicos()
    {
        global $conn;

        $query = "SELECT * FROM paqueteturistico";
        $result = $conn->query($query);

        $paqueteturisticos = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $paquete = new PaqueteTuristico();
                $paquete->setId($row['id']);
                $paquete->setNombre($row['nombre']);
                $paquete->setDireccion($row['direccion']);
                $paquete->setDuracion($row['duracion']);
                $paquete->setImagen($row['imagen']);
                $paquete->setPrecioTotal($row['preciototal']);

                $paqueteturisticos[] = $paquete;
            }
        }

        return $paqueteturisticos;
    }

    public function addPaqueteTuristico($paquete)
    {
        global $conn;

        $nombre = $paquete->getNombre();
        $direccion = $paquete->getDireccion();
        $duracion = $paquete->getDuracion();
        $imagen = $paquete->getImagen();
        $preciototal = $paquete->getPrecioTotal();

        $query = "INSERT INTO paqueteturistico (nombre, direccion, duracion,imagen,preciototal) VALUES ('$nombre', '$direccion', '$duracion','$imagen',$preciototal)";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getPaqueteTuristicoById($id)
    {
        global $conn;

        $query = "SELECT * FROM paqueteturistico WHERE id='$id'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $paquete = new PaqueteTuristico();
            $paquete->setId($row['id']);
            $paquete->setNombre($row['nombre']);
            $paquete->setDireccion($row['direccion']);
            $paquete->setDuracion($row['duracion']);
            $paquete->setImagen($row['imagen']);
            $paquete->setPrecioTotal($row['preciototal']);

            return $paquete;
        }

        return null;
    }

    public function updatePaqueteTuristico($paquete)
    {
        global $conn;

        $id = $paquete->getId();
        $nombre = $paquete->getNombre();
        $direccion = $paquete->getDireccion();
        $duracion = $paquete->getDuracion();
        $imagen = $paquete->getImagen();
        $preciototal = $paquete->getPrecioTotal();


        $query = "UPDATE paqueteturistico SET imagen='$imagen', preciototal=$preciototal , nombre='$nombre', direccion='$direccion', duracion='$duracion' WHERE id='$id'";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePaqueteTuristico($id)
    {
        global $conn;

        $query = "DELETE FROM paqueteturistico WHERE id='$id'";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
