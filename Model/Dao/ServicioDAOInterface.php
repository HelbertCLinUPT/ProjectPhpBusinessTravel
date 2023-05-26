<?php

interface ServicioDAOInterface {
    public function getAllServicios();

    public function addServicio($servicio);

    public function getServicioById($id);

    public function updateServicio($servicio);

    public function deleteServicio($id);
}
?>
