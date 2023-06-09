<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <link href="View/static/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="View/static/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php
        include 'View/header/lateralDashboard.php';
        ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php
                include 'View/header/headerDashboard.php';
                ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Gestión de Servicios</h1>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7 w-100">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Agregar servicio</h1>
                                        </div>
                                        <form class="user" method="POST" action="MainController.php?action=servicio-add">
                                            <div class="form-group row">
                                                <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-user" name="nombre" style="font-size: 18px;" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="costo" class="col-sm-3 col-form-label">Costo:</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control form-control-user" style="font-size: 18px;" name="costo" min="0" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fkidPaqueteturistico" class="col-sm-3 col-form-label">ID PaqueteTuristico:</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" style="font-size: 18px;" name="fkidPaqueteturistico" required>
                                                        <option value="">Seleccionar...</option>
                                                        <?php foreach ($paqueteturisticos as $paquete) : ?>
                                                            <option value="<?php echo $paquete->getId(); ?>"><?php echo $paquete->getNombre(); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fkidProveedor" class="col-sm-3 col-form-label">ID Proveedor:</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control " style="font-size: 18px;" name="fkidProveedor" required>
                                                        <option value="">Seleccionar...</option>
                                                        <?php foreach ($proveedores as $proveedor) : ?>
                                                            <option value="<?php echo $proveedor->getRuc(); ?>"><?php echo $proveedor->getNombre(); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-sm-9 offset-sm-3">
                                                    <input type="submit" value="Agregar" style="font-size: 18px;" class="btn btn-primary btn-user btn-block">
                                                </div>
                                            </div>

                                            <hr>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="View/static/vendor/jquery/jquery.min.js"></script>
    <script src="View/static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="View/static/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="View/static/js/sb-admin-2.min.js"></script>

</body>

</html>