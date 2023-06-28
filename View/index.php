
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Ganancia (Diario)</div>
                                                <?php 
                                                $acumulado = 0;
                                                $fechaActual = date('Y-m-d');
                                                foreach ($pedidos as $pedido) : 
                                                    if ($pedido->getFechaSolicitud() === $fechaActual) {
                                                        $acumulado += $pedido->getCosto();
                                                    }
                                                endforeach; 
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo'$.',$acumulado?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Ganancia (Mensual)</div>
                                            <?php
                                                $acumulado = 0;
                                                $mesActual = date('m');
                                                $anoActual = date('Y');
                                               

                                                foreach ($pedidos as $pedido) {
                                                    $mesPedido = date('m', strtotime($pedido->getFechaSolicitud()));
                                                    $anoPedido = date('Y', strtotime($pedido->getFechaSolicitud()));
                                                     
                                                    if ($mesPedido === $mesActual && $anoPedido === $anoActual) {
                                                        $acumulado += $pedido->getCosto();
                                                    }
                                                }
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo'$.',$acumulado?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            Ganancia (Anual)</div>
                                            <?php
                                            $acumulado = 0;
                                            $anoActual = date('Y');

                                            foreach ($pedidos as $pedido) {
                                                $anoPedido = date('Y', strtotime($pedido->getFechaSolicitud()));
                                                if ($anoPedido === $anoActual) {
                                                    $acumulado += $pedido->getCosto();
                                                }
                                            }
                                            ?>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo'$.',$acumulado?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Cantidad de Pedido</div>
                                                <?php
                                                $acumulado = 0;

                                                foreach ($pedidos as $pedido) {
                                                    $acumulado ++;
                                                }
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo'.',$acumulado?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="View/static/img/undraw_posting_photo.svg" alt="...">
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
    <script src="View/static/vendor/jquery/jquery.min.js"></script>
    <script src="View/static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="View/static/js/sb-admin-2.min.js"></script>

</body>

</html>