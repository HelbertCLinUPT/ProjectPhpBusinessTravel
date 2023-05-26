<?php

interface ProveedorDAOInterface {
    public function getAllProveedores();

    public function addProveedor($proveedor);

    public function getProveedorById($id);

    public function updateProveedor($proveedor);

    public function deleteProveedor($id);
}
?>
