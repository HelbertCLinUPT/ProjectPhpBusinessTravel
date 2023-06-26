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
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script src="View/Static/js/Chatgpt.js"></script>
    <style>
        .hidden {
            display: none;
        }
    </style>
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
                    <h1 class="h3 mb-2 text-gray-800">DISEÑO DE UN NUEVO PAQUETE</h1>
                    <div class="card shadow">
                        <div class="flex h-screen antialiased text-gray-800">
                            <div class="flex flex-row h-full w-full overflow-x-hidden">
                                <div class="flex flex-col flex-auto h-full">
                                    <div class="flex flex-col flex-auto flex-shrink-0 bg-gray-100 h-full p-4">
                                        <div class="flex flex-row items-center h-16 rounded-xl px-4 py-4">
                                            <div class="flex-grow ml-4">
                                                <div class="relative w-full">
                                                    <input type="text" class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" name="consulta" placeholder="Ingrese los detalles del paquete o consultas" />
                                                </div>
                                            </div>
                                            <div class="ml-2">
                                                <div id="buscar-container" class="relative">
                                                    <button id="buscar-btn" class="inline-flex items-center justify-center bg-blue-700 hover:bg-blue-600 rounded-xl text-white px-4 py-2 flex-shrink-0 w-auto h-auto">
                                                        <span class="w-6 h-7 flex items-center justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512">
                                                                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                <path style="fill: #ffffff;" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                                                            </svg>
                                                        </span>
                                                    </button>

                                                    <div id="loading-indicator" class="absolute top-0 left-0 h-8 w-8 bg-white bg-opacity-50 flex items-center justify-center rounded-xl hidden">
                                                        <div class="animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-gray-900"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p id="mensaje-error" class="text-red-500 hidden">Por favor, ingresa una consulta válida.</p>

                                        <div class="flex flex-col mt-4">
                                            <div class="flex flex-row gap-4">
                                                <div class="w-4/5">
                                                    <div id="resultado-consulta" class="relative text-sm bg-white py-2 px-4 shadow rounded-xl mb-4 h-full">
                                                    </div>
                                                </div>
                                                <div class="w-1/5">
                                                    <div class="rounded-xl bg-white py-3 px-3">
                                                        <button class="bg-orange-500 hover:bg-orange-700 text-white w-full py-2 px-4 mb-2 rounded-xl shadow-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-opacity-50">Guardar</button>
                                                        <button onclick="descargarComoPDF()" class="bg-gray-600 hover:bg-gray-700 text-white w-full py-2 px-4 mb-2 rounded-xl shadow-md focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50">Descargar</button>
                                                        <a style="text-decoration: none;" href="MainController.php?action=paquete-disenar-img">
                                                            <button class="bg-cyan-600 hover:bg-Cyan-700 text-white w-full py-2 px-4 mt-8 rounded-xl shadow-md focus:outline-none focus:ring-2 focus:ring-Cyan-500 focus:ring-opacity-50 flex items-center justify-center">
                                                                <span class="">Nueva Imagen</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="ml-2 bi bi-brush" viewBox="0 0 16 16">
                                                                    <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.39 3.39 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3.122 3.122 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043.002.001h-.002z" />
                                                                </svg>
                                                            </button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col mt-4">
                                            <div class="text-center mb-4">
                                                <h1 class="text-xl font-bold">Imágenes relacionadas</h1>
                                            </div>
                                            <div class="flex flex-row">
                                                <div class="w-full">
                                                    <div class="rounded-xl bg-white py-3 px-3 flex flex-row flex-wrap gap-2 justify-center" id="image-container">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <script src="View/static/js/delete-proveedor.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="View/static/js/sb-admin-2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        window.jsPDF = window.jspdf.jsPDF;
    </script>
    <script type="text/javascript" src="View/Static/js/descargarpdf.js"></script>
</body>

</html>
