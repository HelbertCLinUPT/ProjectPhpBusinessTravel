<?php

require_once 'Model/PaqueteTuristico.php';
require_once 'Model/Dao/PaqueteTuristicoDAO.php';

class PaqueteTuristicoController
{
    private $paqueteTuristicoDao;

    public function __construct()
    {
        $this->paqueteTuristicoDao = new PaqueteTuristicoDAO();
    }

    public function index()
    {
        $paqueteturisticos = $this->paqueteTuristicoDao->getAllPaqueteTuristicos();
        include 'View/PaqueteTuristico/index.php';
    }

    public function listar()
    {
        return $this->paqueteTuristicoDao->getAllPaqueteTuristicos();
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $duracion = $_POST['duracion'];
            $nombre_archivo = $_FILES['imagen']['name'];
            $preciototal = $_POST['preciototal'];

            $paqueteTuristico = new PaqueteTuristico();
            $paqueteTuristico->setNombre($nombre);
            $paqueteTuristico->setDireccion($direccion);
            $paqueteTuristico->setDuracion($duracion);
            $paqueteTuristico->setImagen($nombre_archivo);
            $paqueteTuristico->setPrecioTotal($preciototal);

            if ($this->paqueteTuristicoDao->addPaqueteTuristico($paqueteTuristico)) {
                $ruta = $_FILES['imagen']['tmp_name'];
                $destino = "View/img_paquete/" . $nombre_archivo;
                copy($ruta, $destino);

                header('Location: MainController.php?action=paquete-index');
                exit;
            } else {
                echo 'Error adding the PaqueteTuristico.';
            }
        } else {
            include 'View/PaqueteTuristico/add.php';
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $duracion = $_POST['duracion'];

            $filename = true;
            $imagen = $_FILES['imagen']['name'];

            if ($imagen == "") {
                $imagen = $_POST["imagenanterior"];
                $filename = false;
            }

            $preciototal = $_POST['preciototal'];

            $paqueteTuristico = new PaqueteTuristico();
            $paqueteTuristico->setId($id);
            $paqueteTuristico->setNombre($nombre);
            $paqueteTuristico->setDireccion($direccion);
            $paqueteTuristico->setDuracion($duracion);
            $paqueteTuristico->setImagen($imagen);
            $paqueteTuristico->setPrecioTotal($preciototal);

            if ($this->paqueteTuristicoDao->updatePaqueteTuristico($paqueteTuristico)) {
                if ($filename == true) {
                    $ruta = $_FILES['imagen']['tmp_name'];
                    $destino = "View/img_paquete/" . $imagen;
                    copy($ruta, $destino);
                }

                header('Location: MainController.php?action=paquete-index');
                exit;
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

    public function delete($id)
    {
        if ($this->paqueteTuristicoDao->deletePaqueteTuristico($id)) {
            header('Location: MainController.php?action=paquete-index');
            exit;
        } else {
            echo 'Error deleting the PaqueteTuristico.';
        }
    }

    public function list()
    {
        $paqueteturisticos = $this->paqueteTuristicoDao->getAllPaqueteTuristicos();
        include("View/Pagina/paquetes.php");
    }

    public function detalle($id)
    {
        $paquetesTuristicos = $this->paqueteTuristicoDao->listarServicios($id);
        $paqueteTuristico = null;

        if ($paquetesTuristicos->count() > 0) {
            $paqueteTuristico = $paquetesTuristicos->offsetGet(0);
            $servicios = $this->paqueteTuristicoDao->listarServicios($id); // Agrega esta línea
            $imagen = $paqueteTuristico->offsetGet('imagen');
            include 'View/Pagina/detalle.php';
        } else {
            include("View/Pagina/detalle_error.php");
        }
    }
}
