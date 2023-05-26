<!DOCTYPE html>
<html>
<head>
    <title>Editar Paquete Turistico</title>
</head>
<body>
    <h1>Editar Paquete Turistico</h1>

    <form method="POST" action="MainController.php?action=paquete-edit&id=<?php echo $paqueteTuristico->getId(); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $paqueteTuristico->getNombre(); ?>" required><br><br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" value="<?php echo $paqueteTuristico->getDireccion(); ?>" required><br><br>

        <label for="duracion">Duración:</label>
        <input type="text" name="duracion" id="duracion" value="<?php echo $paqueteTuristico->getDuracion(); ?>" required><br><br>

        <input type="submit" value="Actualizar Paquete">
    </form>
</body>
</html>