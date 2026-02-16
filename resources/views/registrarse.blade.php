<!DOCTYPE html>
<html lang="en"> <!-- Se define el idioma de la página como inglés -->

<head>
    <meta charset="UTF-8"> <!-- Codificación de caracteres en UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Para que la vista se adapte a dispositivos móviles -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> <!-- Compatibilidad con Internet Explorer -->
    
    <!-- Tailwind CSS para estilos con clases utilitarias -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Flowbite JS para componentes interactivos compatibles con Tailwind -->
    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
    
    <!-- Font Awesome para íconos como el libro -->
    <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script>
    
    <title>Registrar</title> <!-- Título de la pestaña del navegador -->
</head>

<body>
    <!-- Sección principal con fondo claro/oscuro adaptable -->
    <section class="bg-gray-50 dark:bg-gray-900">
        <!-- Contenedor centrado vertical y horizontalmente -->
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            
            <!-- Encabezado con ícono y nombre de la biblioteca -->
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <i class="fa-solid fa-book-open-reader mr-2"></i>
                BIBLIOTECA
            </a>

            <!-- Contenedor del formulario con fondo blanco u oscuro según modo, sombra y bordes redondeados -->
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                
                <!-- Contenido del formulario con espaciado interno -->
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

                    <!-- Título del formulario -->
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Cree una cuenta
                    </h1>

                    <!-- Formulario de registro que envía datos a la ruta users.store -->
                    <form class="space-y-4 md:space-y-6" action="{{ route('users.store') }}" method="POST">
                        @csrf <!-- Token de seguridad CSRF para Laravel -->

                        <!-- Campo: Nombre completo -->
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nombre completo
                            </label>
                            <input type="text" name="name" id="name" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Juan Pérez">
                        </div>

                        <!-- Campo: Email -->
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Email
                            </label>
                            <input type="email" name="email" id="email" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com">
                        </div>

                        <!-- Campo: Contraseña -->
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Contraseña
                            </label>
                            <input type="password" name="password" id="password" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="••••••••">
                        </div>

                        <!-- Campo: Confirmar contraseña -->
                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Confirmar contraseña
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="••••••••">
                        </div>

                        <!-- Botón para enviar el formulario -->
                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Crear cuenta
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
