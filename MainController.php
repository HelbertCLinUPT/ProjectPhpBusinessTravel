<?php
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Include necessary controller files
require_once 'Controller/UsuarioController.php';
require_once 'Controller/PaqueteTuristicoController.php';
require_once 'Controller/ReservaInteresadoController.php';
require_once 'Controller/ServicioController.php';
require_once 'Controller/ProveedorController.php';

// Create controller instances
$usuarioController = new UsuarioController();
$paqueteTuristicoController = new PaqueteTuristicoController();
$reservaInteresadoController = new ReservaInteresadoController();
$servicioController = new ServicioController();
$proveedorController = new ProveedorController();

switch ($action) {
    // User-related actions
    case 'usuario-index':
        $usuarioController->index();
        break;
    case 'usuario-add':
        $usuarioController->add();
        break;
    case 'usuario-edit':
        $usuarioController->edit($id);
        break;
    case 'usuario-delete':
        $usuarioController->delete($id);
        break;

    // PaqueteTuristico-related actions
    case 'paquete-index':
        $paqueteTuristicoController->index();
        break;
    case 'paquete-add':
        $paqueteTuristicoController->add();
        break;
    case 'paquete-edit':
        $paqueteTuristicoController->edit($id);
        break;
    case 'paquete-delete':
        $paqueteTuristicoController->delete($id);
        break;

    // ReservaInteresado-related actions
    case 'interesado-index':
        $reservaInteresadoController->index();
        break;
    case 'interesado-add':
        $reservaInteresadoController->add();
        break;
    case 'interesado-edit':
        $reservaInteresadoController->edit($id);
        break;
    case 'interesado-delete':
        $reservaInteresadoController->delete($id);
        break;

    // Servicio-related actions
    case 'servicio-index':
        $servicioController->index();
        break;
    case 'servicio-add':
        $servicioController->add();
        break;
    case 'servicio-edit':
        $servicioController->edit($id);
        break;
    case 'servicio-delete':
        $servicioController->delete($id);
        break;

    // Proveedor-related actions
    case 'proveedor-index':
        $proveedorController->index();
        break;
    case 'proveedor-add':
        $proveedorController->add();
        break;
    case 'proveedor-edit':
        $proveedorController->edit($id);
        break;
    case 'proveedor-delete':
        $proveedorController->delete($id);
        break;
    // Login
    case 'login-user':
        include("View/Pagina/login.php");
        break;
    // Pagina Web
    case 'main-index':
        include("View/Pagina/index.php");
        break;
    default:
        header("location:index.php");
        break;
}
?>
