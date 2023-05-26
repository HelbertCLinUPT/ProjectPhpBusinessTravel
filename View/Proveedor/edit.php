<!DOCTYPE html>
<html>
<head>
    <title>Editar Proveedor</title>
</head>
<body>
    <h1>Editar Proveedor</h1>
    <form method="POST" action="MainController.php?action=proveedor-edit&id=<?php echo $proveedor->getRuc(); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $proveedor->getNombre(); ?>" required><br>
        <label for="pais">País:</label>
        <input type="text" name="pais" value="<?php echo $proveedor->getPais(); ?>" required><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
