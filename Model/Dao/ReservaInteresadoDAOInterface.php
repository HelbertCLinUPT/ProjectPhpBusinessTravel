<?php

interface ReservaInteresadoDAOInterface {
    public function getAllReservaInteresados();

    public function addReservaInteresado($reservainteresado);

    public function getReservaInteresadoById($id);

    public function updateReservaInteresado($reservainteresado);

    public function deleteReservaInteresado($id);
}
?>
