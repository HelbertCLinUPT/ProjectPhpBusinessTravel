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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    <h1 class="h3 mb-2 text-gray-800">Gestión de Interesados en Reservas</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-items-center">
                            <a href="MainController.php?action=interesado-add" class="text-decoration-none">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-plus-circle mr-2"></i>
                                        Agregar
                                    </button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Interesados en Reservas</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="paquete">Filtrar por paquete turístico:</label>
                                <select class="form-control" id="paquete">
                                    <option value="">Todos</option>
                                    <?php
                                    $paquetesAgregados = []; 
                                    foreach ($reservainteresados as $paquete) {
                                        $nombrePaquete = $paquete->getFkIdServicio();
                                        if (!in_array($nombrePaquete, $paquetesAgregados)) {
                                            $paquetesAgregados[] = $nombrePaquete; 
                                            ?>
                                            <option value="<?php echo $paquete->getFkIdServicio(); ?>"><?php echo $nombrePaquete; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Precio Total</th>
                                            <th>Usuario</th>
                                            <th>Paquete Turistico</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($reservainteresados as $reservainteresado) : ?>
                                            <tr data-paquete="<?php echo $reservainteresado->getFkIdServicio(); ?>">
                                                <td><?php echo $reservainteresado->getId(); ?></td>
                                                <td><?php echo $reservainteresado->getNombre(); ?></td>
                                                <td><?php echo $reservainteresado->getPrecioTotal(); ?></td>
                                                <td><?php echo $reservainteresado->getFkIdUsuario(); ?></td>
                                                <td><?php echo $reservainteresado->getFkIdServicio(); ?></td>

                                                <td class="col-2">
                                                    <a href="MainController.php?action=interesado-edit&id=<?php echo $reservainteresado->getId(); ?>" class="btn btn-warning btn-circle">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-circle delete-button" data-id="<?php echo $reservainteresado->getId(); ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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
    <script src="View/static/js/delete-reservas.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="View/static/js/sb-admin-2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#paquete').change(function() {
                var selectedPaquete = $(this).val();
                if (selectedPaquete) {
                    $('#dataTable tbody tr').hide();
                    $('#dataTable tbody tr[data-paquete="' + selectedPaquete + '"]').show();
                } else {
                    $('#dataTable tbody tr').show();
                }
            });
        });
    </script>

</body>

</html>
