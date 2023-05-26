<!DOCTYPE html>
<html>
<head>
    <title>Editar Servicio</title>
</head>
<body>
    <h1>Editar Servicio</h1>
    <form method="POST" action="MainController.php?action=servicio-edit&id=<?php echo $servicio->getId(); ?>">
        <label for="costo">Costo:</label>
        <input type="text" name="costo" value="<?php echo $servicio->getCosto(); ?>" required><br>
        <label for="fkidProveedor">ID Proveedor:</label>
        <input type="text" name="fkidProveedor" value="<?php echo $servicio->getFkidProveedor(); ?>" required><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
