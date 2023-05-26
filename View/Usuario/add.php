<!DOCTYPE html>
<html>
<head>
    <title>Agregar Usuario</title>
</head>
<body>
    <h1>Agregar Usuario</h1>
    <form method="POST" action="MainController.php?action=usuario-add">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required><br>
        <label for="numero_celular">Número de Celular:</label>
        <input type="text" name="numero_celular" required><br>
        <label for="rol">Rol:</label>
        <input type="text" name="rol" required><br>
        <input type="submit" value="Agregar">
    </form>
</body>
</html>
