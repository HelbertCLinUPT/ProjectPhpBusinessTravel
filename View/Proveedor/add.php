<!DOCTYPE html>
<html>
<head>
    <title>Agregar Proveedor</title>
</head>
<body>
    <h1>Agregar Proveedor</h1>
    <form method="POST" action="MainController.php?action=proveedor-add">
        <label for="ruc">RUC:</label>
        <input type="text" name="ruc" required><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="pais">País:</label>
        <input type="text" name="pais" required><br>
        <input type="submit" value="Agregar">
    </form>
</body>
</html>
