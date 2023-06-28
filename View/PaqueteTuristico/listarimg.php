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
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/lazysizes@5.3.2/lazysizes.min.js"></script>
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
                <div class="container">
                    <div class="container mx-auto px-4 py-8">
                        <h1 class="text-3xl font-bold mb-6 text-center">Listado de Imágenes</h1>
                        <div class="flex items-center mb-4">
                            <label for="country-select" class="mr-2">Seleccionar país:</label>
                            <select id="country-select" class="px-2 py-1 rounded">
                            </select>
                        </div>
                        <div id="image-list" class="space-y-8"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="View/static/js/disenarimg.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="View/static/vendor/jquery/jquery.min.js"></script>
    <script src="View/static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="View/static/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="View/static/js/sb-admin-2.min.js"></script>
    <script type="text/javascript" src="View/static/js/listarimagenes.js"></script>

</body>

</html>