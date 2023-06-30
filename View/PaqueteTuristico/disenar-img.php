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
    <script src="https://cdn.jsdelivr.net/npm/lazysizes@5.3.2/lazysizes.min.js"></script>
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
                    <h1 class="h3 mb-2 text-gray-800">Nueva Imagen</h1>
                    <div class="card shadow">
                        <div class="flex flex-col flex-auto h-full p-3">
                            <div class="flex flex-row flex-wrap items-center rounded-xl px-4 py-2">
                                <div class="float-left w-full sm:w-auto">
                                    <select name="forma" class=" mt-2 rounded-xl border h-10 pl-2 pr-8 py-1 focus:outline-none focus:border-indigo-300">
                                        <option selected value="landscape">
                                            Horizontal
                                        </option>
                                        <option value="portrait">
                                            Vertical
                                        </option>
                                        <option value="squarish">
                                            Cuadrada
                                        </option>
                                    </select>
                                </div>
                                <div class="p-3 flex flex-col sm:flex-row">
                                    <div class="flex items-center pl-3 mt-2">
                                        <input type="checkbox" id="titulo-checkbox" value="" checked class="w-6 h-6 form-checkbox text-blue-600 bg-gray-100 border-gray-300 rounded">
                                        <label for="titulo-checkbox" class="ml-2 h-4 text-lg no-underline cursor-pointer">Titulo</label>
                                    </div>
                                    <div class="flex items-center pl-3 mt-2">
                                        <input type="checkbox" id="logo-checkbox" value="" checked class="w-6 h-6 form-checkbox text-blue-600 bg-gray-100 border-gray-300 rounded">
                                        <label for="logo-checkbox" class="ml-2 h-4 text-lg no-underline cursor-pointer">Logo</label>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="flex-grow ml-4">
                                <div class="relative w-full">
                                    <input type="text" class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" name="consulta" placeholder="Ingrese su búsqueda, puede ser un país o lugar" />
                                </div>
                            </div>
                            <div class="ml-4 mt-3">
                                <div id="disenar-container" class="relative">
                                    <button id="disenar-btn" class="inline-flex items-center justify-center bg-blue-700 hover:bg-indigo-600 rounded-xl text-white px-4 py-2 flex-shrink-0 min-w-[6rem] h-auto">
                                        <svg class="w-6 h-7 flex items-center justify-center" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="ml-2 bi bi-brush" viewBox="0 0 16 16">
                                            <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247a.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.39 3.39 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3.122 3.122 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.128 5.128 0 0 0 .73-.467l.263-.198a1.54 1.54 0 0 0 .392-.398c.12-.155.237-.315.364-.5l.178-.285c.17-.273.326-.562.502-.944a1.232 1.232 0 0 0-.618-.182l-1.91-.003z" />
                                        </svg>
                                        <span class="ml-2">Diseñar</span>
                                    </button>
                                    <div id="loading-indicator" class="absolute top-0 left-0 h-10 w-10 bg-blue bg-opacity-50 flex items-center justify-center rounded-xl hidden">
                                        <div class="animate-spin rounded-full h-10 w-10 border-t-2 border-b-2 border-blue-900"></div>
                                    </div>
                                </div>
                            </div>
                            <p id="mensaje-error" class="text-red-500 hidden">Por favor, ingresa una consulta válida.</p>
                            <p id="mensaje-no-found" class="text-orange-800 hidden">No se encontraron imágenes con esa orientación</p>
                            <div class="flex flex-col mt-4">
                                <div class="text-center mb-4">
                                    <h1 id="results" class="text-xl font-bold hidden">Resultados</h1>
                                </div>
                                <div id="gallery" class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 py-4">
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
    <script src="View/static/js/disenarimg.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="View/static/vendor/jquery/jquery.min.js"></script>
    <script src="View/static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="View/static/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="View/static/js/sb-admin-2.min.js"></script>
</body>

</html>