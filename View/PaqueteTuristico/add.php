<!DOCTYPE html>
<html>
<head>
    <title>Agregar Paquete Turistico</title>
</head>
<body>
    <h1>Agregar Paquete Turistico</h1>

    <form method="POST" action="MainController.php?action=paquete-add">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" required><br><br>

        <label for="duracion">Duración:</label>
        <input type="text" name="duracion" id="duracion" required><br><br>

        <input type="submit" value="Agregar Paquete">
    </form>
</body>
</html>
