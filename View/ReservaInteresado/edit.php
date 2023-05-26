<!DOCTYPE html>
<html>
<head>
    <title>Editar Reserva de Interesado</title>
</head>
<body>
    <h1>Editar Reserva de Interesado</h1>
    <form method="POST" action="MainController.php?action=interesado-edit&id=<?php echo $reservaInteresado->getId(); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $reservaInteresado->getNombre(); ?>" required><br>
        <label for="precio_total">Precio Total:</label>
        <input type="text" name="preciototal" value="<?php echo $reservaInteresado->getPrecioTotal(); ?>" required><br>
        <label for="id_usuario">ID Usuario:</label>
        <input type="text" name="fkidusuario" value="<?php echo $reservaInteresado->getFkidUsuario(); ?>" required><br>
        <label for="id_servicio">ID Servicio:</label>
        <input type="text" name="fkidservicio" value="<?php echo $reservaInteresado->getFkidServicio(); ?>" required><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
