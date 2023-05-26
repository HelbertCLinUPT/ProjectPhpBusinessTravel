<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
</head>
<body>
    <h1>Usuarios</h1>
    <a href="MainController.php?action=usuario-add">Agregar Usuario</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Número de Celular</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario->getId(); ?></td>
                    <td><?php echo $usuario->getNombre(); ?></td>
                    <td><?php echo $usuario->getApellido(); ?></td>
                    <td><?php echo $usuario->getNumeroCelular(); ?></td>
                    <td><?php echo $usuario->getRol(); ?></td>
                    <td>
                        <a href="MainController.php?action=usuario-edit&id=<?php echo $usuario->getId(); ?>">Editar</a>
                        <a href="MainController.php?action=usuario-delete&id=<?php echo $usuario->getId(); ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
