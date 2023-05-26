<!DOCTYPE html>
<html>
<head>
    <title>Agregar Reserva de Interesado</title>
</head>
<body>
    <h1>Agregar Reserva de Interesado</h1>
    <form method="POST" action="MainController.php?action=interesado-add">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="precio_total">Precio Total:</label>
        <input type="text" name="preciototal" required><br>
        <label for="id_usuario">ID Usuario:</label>
        <input type="text" name="fkidusuario" required><br>
        <label for="id_servicio">ID Servicio:</label>
        <input type="text" name="fkidservicio" required><br>
        <input type="submit" value="Agregar">
    </form>
</body>
</html>
