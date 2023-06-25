<?php

require_once 'Model/PaqueteTuristico.php';

interface PaqueteTuristicoDaoInterface {
    public function getAllPaqueteTuristicos();

    public function addPaqueteTuristico(PaqueteTuristico $paquete);

    public function getPaqueteTuristicoById($id);

    public function updatePaqueteTuristico(PaqueteTuristico $paquete);

    public function deletePaqueteTuristico($id);

    public function listarServicios($id);
}
?>
