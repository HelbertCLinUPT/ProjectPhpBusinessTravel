<?php

require_once 'Model/Dao/PedidoDAO.php';

class PedidoController
{
    private $pedidoDAO;

    public function __construct()
    {
        $this->pedidoDAO = new PedidoDao();
    }

    public function index()
    {
        $pedidos = $this->pedidoDAO->getAllPedido();
        include 'View/Pedido/index.php';
    }

    public function EnvioPedido()
    {
        $correo = 'businesstravel183@gmail.com';

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'businesstravel183@gmail.com';
        $mail->Password = 'tyaduejbduyyaykm';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('businesstravel183@gmail.com', 'Pedidos');
        $mail->addAddress($correo, 'Usuario');
        $mail->isHTML(true);
        $mail->Subject = mb_encode_mimeheader('📢 Solicitud de Pedidos', 'UTF-8');

        $mail->Body = 'Hola, te informamos que se ha registrado una nueva reserva de pedido con éxito. Por favor, revisa los detalles en tu panel de administración o sistema correspondiente para obtener más información.';

        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }


    public function add()
    {
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

    public function userAdd()
    {
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

            include 'View/Pagina/pedidos.php';
            echo '<script src="View/Pagina/js/sweetalert2.all.min.js"></script>';
            if ($this->pedidoDAO->addPedido($pedido)) {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Éxito",
                            text: "El pedido se ha enviado correctamente."
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "MainController.php?action=page-index";
                            }
                        });
                      </script>';

                //header('Location: MainController.php?action=page-index');
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Error al agregar el pedido.",
                        });
                      </script>';
            }
        } else {
            include 'View/Pedido/add.php';
        }
    }


    public function edit($id)
    {
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

    public function delete($id)
    {
        if ($this->pedidoDAO->deletePedido($id)) {
            header('Location: MainController.php?action=pedido-index');
        } else {
            echo 'Error deleting the pedido.';
        }
    }

    public function indexstadistic()
    {
        $pedidos = $this->pedidoDAO->getAllPedido();
        include 'View/index.php';
    }
}
