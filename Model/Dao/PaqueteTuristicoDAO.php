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
    
    public function listarServicios($id) {
        global $conn;
    
        $sql = "SELECT
                    paq.nombre,
                    paq.direccion,
                    paq.duracion,
                    paq.preciototal,
                    paq.imagen,
                    s.nombre AS servicio,
                    pr.nombre AS proveedor
                FROM
                    paqueteturistico paq
                    INNER JOIN servicios s ON s.fkidPaqueteTuristico = paq.id
                    INNER JOIN proveedores pr ON pr.ruc = s.fkidProveedor
                WHERE
                    paq.id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        $paquetesTuristicos = new ArrayObject(); // Crear una instancia de ArrayObject
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $paqueteTuristico = new ArrayObject(); // Crear una instancia de ArrayObject para cada paquete turístico
    
                $paqueteTuristico->offsetSet('nombre', $row['nombre']);
                $paqueteTuristico->offsetSet('direccion', $row['direccion']);
                $paqueteTuristico->offsetSet('duracion', $row['duracion']);
                $paqueteTuristico->offsetSet('preciototal', $row['preciototal']);
                $paqueteTuristico->offsetSet('imagen', $row['imagen']);
                $paqueteTuristico->offsetSet('servicio', $row['servicio']);
                $paqueteTuristico->offsetSet('proveedor', $row['proveedor']);
    
                $paquetesTuristicos->append($paqueteTuristico); // Agregar el objeto al ArrayObject
            }
        }
    
        $stmt->close();
        return $paquetesTuristicos;
    }
    
    
}
