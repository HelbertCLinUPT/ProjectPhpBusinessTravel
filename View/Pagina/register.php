<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Register</title>
    <link rel="icon" href="View/Pagina/img/Fevicon.png" type="image/png">

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
                    xl:text-bold">Sign Up</h2>
                <div class="mt-12">
                    <form action="MainController.php?action=login-register" method="post">
                        <div >
                            <div class="text-sm font-bold text-gray-700 tracking-wide">Nombre</div>
                            <input name="nombre" class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="text" placeholder="Enter your full name" required>
                        </div>
                        <div class="mt-8">
                            <div class="text-sm font-bold text-gray-700 tracking-wide">Apellido</div>
                            <input name="apellido" class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="text" placeholder="Enter your full name">
                        </div>
                        <div class="mt-8">
                            <div class="text-sm font-bold text-gray-700 tracking-wide">Numero de contacto</div>
                            <input name="numeroCelular" class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="number" min="0" placeholder="Ingresar su teléfono" required>

                        </div>
                        <div class="mt-8">
                            <div class="text-sm font-bold text-gray-700 tracking-wide">Email</div>
                            <input name="email" class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="email" placeholder="Example@gmail.com" required>
                        </div>

                        <div class="mt-8">
                            <div class="flex justify-between items-center">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">
                                    Contraseña
                                </div>
                            </div>
                            <input name="password"  class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="password" placeholder="Enter your password" required>
                        </div>
                        <input type="hidden" name="rol" value="1">
                        <div class="mt-10">
                            <button class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600 shadow-lg">
                                Sign Up
                            </button>
                        </div>
                    </form>

                    <div class="mb-8 mt-6 text-sm font-display font-semibold text-gray-700 text-center">
                        Already have an account? <a href="MainController.php?action=login-user" class="cursor-pointer text-indigo-600 hover:text-indigo-800">Log in</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center bg-indigo-100 flex-1 h-full">
            <img src="View/Pagina/img/banner-avion.jpg" class="h-full" alt="">
        </div>
    </div>


</body>

</html>