<!DOCTYPE html>
<html>
<head>
    <title>Servicios</title>
</head>
<body>
    <h1>Servicios</h1>
    <a href="MainController.php?action=servicio-add">Agregar Servicio</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Costo</th>
                <th>ID Proveedor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicios as $servicio): ?>
                <tr>
                    <td><?php echo $servicio->getId(); ?></td>
                    <td><?php echo $servicio->getCosto(); ?></td>
                    <td><?php echo $servicio->getFkidProveedor(); ?></td>
                    <td>
                        <a href="MainController.php?action=servicio-edit&id=<?php echo $servicio->getId(); ?>">Editar</a>
                        <a href="MainController.php?action=servicio-delete&id=<?php echo $servicio->getId(); ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
