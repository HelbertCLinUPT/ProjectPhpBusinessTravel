<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class>
    <div class="lg:flex">
        <div class="lg:w-1/2 xl:max-w-screen-sm">
            <div class="py-6 bg-indigo-100 lg:bg-white flex justify-center lg:justify-start lg:px-12">
                <a href="MainController.php?action=main-index">
                    <div class="cursor-pointer flex items-center">
                        <div>
                            <img src="View/Pagina/img/LogoEmpresa.png" class="h-10 w-auto" alt="logo">
                        </div>
                        <div class="text-2xl text-indigo-800 tracking-wide ml-2 font-semibold">Business Travel</div>
                    </div>
                </a>
            </div>
            <div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
                <h2 class="text-center text-4xl text-indigo-900 font-display font-semibold lg:text-left xl:text-5xl
                    xl:text-bold">Reestrablecer Contraseña:</h2>
                <div class="mt-12">

                    <form action="MainController.php?action=login-forgot" method="post">
                        <div>
                            <div class="text-sm font-bold text-gray-700 tracking-wide">Ingrese su Token</div>
                            <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" name="codigo" type="text" required>
                        </div>
                        <br>
                        <div>
                            <div class="text-sm font-bold text-gray-700 tracking-wide">Ingrese su Nueva Contraseña</div>
                            <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" name="password" type="password" required>
                        </div>
                        <br>
                        <div>
                            <div class="text-sm font-bold text-gray-700 tracking-wide">Confirme su Nueva Contraseña</div>
                            <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" name="password2" type="password"  required>
                        </div>

                        <div class="mt-10">
                            <button class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600 shadow-lg">
                                Cambiar Contraseña
                            </button>
                        </div>
                        

                    </form>

                    <div class="mt-12 mb-12 text-sm font-display font-semibold text-gray-700 text-center">
                        <a href="MainController.php?action=login-user" class="cursor-pointer text-indigo-600 hover:text-indigo-800">
                            Regresar
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center bg-indigo-100 flex-1 h-auto">
            <img src="View/Pagina/img/banner-avion.jpg" alt="" class="h-full w-full object-cover">
        </div>
    </div>
</body>

</html>