<!DOCTYPE html>
<html>
<head>
    <title>Proveedores</title>
</head>
<body>
    <h1>Proveedores</h1>
    <a href="MainController.php?action=proveedor-add">Agregar Proveedor</a>
    <table>
        <thead>
            <tr>
                <th>RUC</th>
                <th>Nombre</th>
                <th>País</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proveedores as $proveedor): ?>
                <tr>
                    <td><?php echo $proveedor->getRuc(); ?></td>
                    <td><?php echo $proveedor->getNombre(); ?></td>
                    <td><?php echo $proveedor->getPais(); ?></td>
                    <td>
                        <a href="MainController.php?action=proveedor-edit&id=<?php echo $proveedor->getRuc(); ?>">Editar</a>
                        <a href="MainController.php?action=proveedor-delete&id=<?php echo $proveedor->getRuc(); ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
