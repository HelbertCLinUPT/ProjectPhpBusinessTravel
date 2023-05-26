<!DOCTYPE html>
<html>
<head>
    <title>Reservas de Interesados</title>
</head>
<body>
    <h1>Reservas de Interesados</h1>
    <a href="MainController.php?action=interesado-add">Agregar Reserva de Interesado</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio Total</th>
                <th>ID Usuario</th>
                <th>ID Servicio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservainteresados as $reserva): ?>
                <tr>
                    <td><?php echo $reserva->getId(); ?></td>
                    <td><?php echo $reserva->getNombre(); ?></td>
                    <td><?php echo $reserva->getPrecioTotal(); ?></td>
                    <td><?php echo $reserva->getFkidUsuario(); ?></td>
                    <td><?php echo $reserva->getFkidServicio(); ?></td>
                    <td>
                        <a href="MainController.php?action=interesado-edit&id=<?php echo $reserva->getId(); ?>">Editar</a>
                        <a href="MainController.php?action=interesado-delete&id=<?php echo $reserva->getId(); ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
