<?php

require_once 'Model/Pedido.php';

interface PedidoDaoInterface {
    public function getAllPedido();

    public function addPedido(Pedido $pedido);

    public function getPedidoById($id);

    public function updatePedido(Pedido $pedido);

    public function deletePedido($id);
}
?>
