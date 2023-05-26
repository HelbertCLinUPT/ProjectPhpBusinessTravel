<!DOCTYPE html>
<html>
<head>
    <title>Agregar Servicio</title>
</head>
<body>
    <h1>Agregar Servicio</h1>
    <form method="POST" action="MainController.php?action=servicio-add">
        <label for="costo">Costo:</label>
        <input type="text" name="costo" required><br>
        <label for="fkidProveedor">ID Proveedor:</label>
        <input type="text" name="fkidProveedor" required><br>
        <input type="submit" value="Agregar">
    </form>
</body>
</html>
