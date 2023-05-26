<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form method="POST" action="MainController.php?action=usuario-edit&id=<?php echo $usuario->getId(); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $usuario->getNombre(); ?>" required><br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="<?php echo $usuario->getApellido(); ?>" required><br>
        <label for="numeroCelular">Número de Celular:</label>
        <input type="text" name="numeroCelular" value="<?php echo $usuario->getNumeroCelular(); ?>" required><br>
        <label for="rol">Rol:</label>
        <input type="text" name="rol" value="<?php echo $usuario->getRol(); ?>" required><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
