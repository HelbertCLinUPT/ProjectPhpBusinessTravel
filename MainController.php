<?php
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;


// Controladores
require_once 'Controller/UsuarioController.php';
require_once 'Controller/PaqueteTuristicoController.php';
require_once 'Controller/ReservaInteresadoController.php';
require_once 'Controller/ServicioController.php';
require_once 'Controller/ProveedorController.php';
require_once 'Controller/LoginController.php';
require_once 'Controller/PedidoController.php';


// Instancias
$usuarioController = new UsuarioController();
$paqueteTuristicoController = new PaqueteTuristicoController();
$reservaInteresadoController = new ReservaInteresadoController();
$servicioController = new ServicioController();
$proveedorController = new ProveedorController();
$loginController = new LoginController();
$PedidoController = new PedidoController();



session_start();


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

        // Pedido-related actions
    case 'pedido-index':
        $PedidoController->index();
        break;
    case 'pedido-add':
        $PedidoController->add();
        break;
    case 'pedido-edit':
        $PedidoController->edit($id);
        break;
    case 'pedido-delete':
        $PedidoController->delete($id);
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
    case 'paquete-disenar':
        include("View/PaqueteTuristico/diseñar.php");
        break;
    case 'paquete-disenar-img':
        include("View/PaqueteTuristico/disenar-img.php");
        break;
    case 'paquete-listar-img':
        include("View/PaqueteTuristico/listarimg.php");
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
        $proveedores = $proveedorController->listar();
        $paqueteturisticos = $paqueteTuristicoController->listar();
        $result = $servicioController->add($proveedores, $paqueteturisticos);
        break;

    case 'servicio-edit':
        $proveedores = $proveedorController->listar();
        $paqueteturisticos = $paqueteTuristicoController->listar();
        $result = $servicioController->edit($id, $proveedores, $paqueteturisticos);
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
        $loginController->index();
        break;
    case 'login-ingresar':
        $loginController->ingresar();
        break;
    case 'login-recuperar':
        $loginController->RecuperarCuenta();
        break;
    case 'login-forgot':
        $loginController->ReestablecerPassword();
        break;

    case 'login-register':
        $loginController->registrarse();
        break;
    case 'login-logout':
        $loginController->salir();
        break;

        // Pagina Web Links
    case 'main-index':
        include("View/Pagina/index.php");
        break;
    case 'page-nosotros':
        include("View/Pagina/nosotros.php");
        break;
    case 'page-ofertas':
        include("View/Pagina/ofertas.php");
        break;
    case 'page-paquetes':
        $paqueteTuristicoController->list();
        break;
    case 'page-contactanos':
        include("View/Pagina/contactanos.php");
        break;
    case 'paquete-detalle':
        $paqueteTuristicoController->detalle($id);
        break;

    case 'page-pedido':
        include("View/Pagina/pedidos.php");
        break;

    case 'page-pedido-add':
        $PedidoController->userAdd();
        
        if (isset($_GET['send-email']) && $_GET['send-email'] == 'true') {
            if ($PedidoController->EnvioPedido()) {
                error_log('¡Correo enviado con éxito!');
            } else {
                error_log('Error al enviar el correo.');
            }
        }
        break;
        
        // Admin
    case 'admin-index':
        //include("View/index.php");
        $PedidoController->indexstadistic();
        break;
    default:
        header("location:index.php");
        break;
}
