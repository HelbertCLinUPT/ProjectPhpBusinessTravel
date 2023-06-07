<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar Proveedor</title>
    <link href="View/static/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="View/static/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include 'View/header/lateralDashboard.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include 'View/header/headerDashboard.php'; ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Editar Proveedor</h1>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form method="POST" action="MainController.php?action=proveedor-edit&id=<?php echo $proveedor->getRuc(); ?>">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $proveedor->getNombre(); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="pais">País:</label>
                                    <input type="text" class="form-control" name="pais" value="<?php echo $proveedor->getPais(); ?>" required>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Actualizar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="View/static/vendor/jquery/jquery.min.js"></script>
    <script src="View/static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="View/static/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="View/static/js/sb-admin-2.min.js"></script>
</body>

</html>
