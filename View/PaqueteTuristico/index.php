<!DOCTYPE html>
<html>
<head>
    <title>Paquete Turistico - Listado</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Paquete Turistico - Listado</h1>

    <a href="MainController.php?action=paquete-add">Agregar Nuevo Paquete</a>

    <?php if (empty($paqueteturisticos)) : ?>
        <p>No se encontraron paquetes turisticos.</p>
    <?php else : ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Duración</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($paqueteturisticos as $paquete) : ?>
                <tr>
                    <td><?php echo $paquete->getId(); ?></td>
                    <td><?php echo $paquete->getNombre(); ?></td>
                    <td><?php echo $paquete->getDireccion(); ?></td>
                    <td><?php echo $paquete->getDuracion(); ?></td>
                    <td>
                        <a href="MainController.php?action=paquete-edit&id=<?php echo $paquete->getId(); ?>">Editar</a>
                        <a href="MainController.php?action=paquete-delete&id=<?php echo $paquete->getId(); ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
