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
    <link href="https://unpkg.com/tailwindcss@1.9.6/dist/tailwind.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="View/static/js/Chatgpt.js"></script>

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
                                                

                                                <div class="w-3/12">
                                                    <div class="rounded-xl bg-white py-3 px-3">

                                                        <button onclick="borrarConversacion()" class="bg-red-600 hover:bg-red-700 text-white w-full py-2 px-4 mb-2 rounded-xl shadow-md focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50">Borrar Conversacion</button>

                                                        <button id="ButtonDownload" onclick="descargarComoPDF()" class="hidden bg-gray-600 hover:bg-gray-700 text-white w-full py-2 px-4 mb-2 rounded-xl shadow-md focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50">Descargar PDF</button>
                                                    </div>
                                                </div>
                                                <div class="w-9/12">
                                                    <div id="resultado-consulta" class="relative text-sm bg-white py-3 px-4 shadow rounded-xl mb-4 h-full">
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



    <script>
        function borrarConversacion() {
            localStorage.setItem('resultado-consulta', '');
            localStorage.setItem('resultado-mensajes', '');
            location.reload();
        }
    </script>


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
    <script type="text/javascript" src="View/static/js/descargarpdf.js"></script>
</body>

</html>