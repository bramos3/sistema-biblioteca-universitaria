<!DOCTYPE html> <!-- Define el tipo de documento como HTML5 -->
<html lang="es"> <!-- Idioma principal del contenido en español -->

<head>
    <meta charset="UTF-8" /> <!-- Codificación de caracteres para soportar símbolos latinos -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Escala inicial para responsive -->

    <!-- Importación de Tailwind CSS (utilidades de estilo) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Importación de estilos y scripts de Flowbite (componentes UI como botones, select, etc.) -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <!-- jQuery: librería de JavaScript para facilitar la manipulación del DOM -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- FontAwesome: librería de íconos -->
    <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script>

    <!-- Archivos JavaScript propios del proyecto -->
    <script type="module" src="../jquery/dashboard.js"></script> <!-- Lógica relacionada al dashboard -->
    <script src="../jquery/prestamo.js"></script> <!-- JS específico para la funcionalidad de préstamo -->

    <title>Nuevo Prestamo</title> <!-- Título que se muestra en la pestaña del navegador -->
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen"> <!-- Estilos para fondo claro u oscuro -->

    @include('partes.nav') <!-- Incluye el menú de navegación superior desde una vista parcial -->

    <div class="flex"> <!-- Contenedor principal con distribución horizontal -->

        <!-- Barra lateral izquierda (sidebar) fija -->
        <aside class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 pt-16">
            @include('partes.sidebar') <!-- Incluye contenido del menú lateral -->
        </aside>

        <!-- Contenido principal -->
        <div class="ml-64 w-full pt-16 p-6 min-h-[calc(100vh-4rem)] flex flex-col">

            <div class="flex-grow flex items-center justify-center"> <!-- Centrado vertical y horizontal -->

                <!-- Formulario para registrar un préstamo -->
                <form action="{{ route('prestamos.store') }}" method="POST"
                    class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8 w-full max-w-md">
                    
                    @csrf <!-- Token CSRF obligatorio para enviar datos seguros -->

                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">
                        Registrar Nuevo Prestamo
                    </h2>

                    <!-- Selección de estudiante -->
                    <div class="mb-4">
                        <label for="codigo_estudiante" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Código de estudiante
                        </label>
                        <select name="codigo_estudiante" id="codigo_estudiante" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400">
                            <option value="">-- Selecciona un código --</option>
                            @foreach ($estudiantes as $estudiante) <!-- Carga dinámica de opciones -->
                                <option value="{{ $estudiante->codigo }}">{{ $estudiante->codigo }}</option>
                            @endforeach
                        </select>
                        @error('codigo_estudiante') <!-- Muestra error si ocurre -->
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo fecha de préstamo -->
                    <div class="mb-4">
                        <label for="fecha_prestamo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Fecha de préstamo
                        </label>
                        <input type="date" id="fecha_prestamo" name="fecha_prestamo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" />
                        @error('fecha_prestamo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo fecha de entrega -->
                    <div class="mb-4">
                        <label for="fecha_entrega" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Fecha de entrega
                        </label>
                        <input type="date" id="fecha_entrega" name="fecha_entrega"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" />
                        @error('fecha_entrega')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo personal responsable del préstamo -->
                    <div class="mb-4">
                        <label for="personal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Personal
                        </label>
                        <input type="text" id="personal" name="personal" placeholder="Nombre Personal"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" />
                        @error('personal')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Selección del libro -->
                    <div class="mb-4">
                        <label for="libro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Código del Libro
                        </label>
                        <select name="codigo_libro" id="codigo_libro" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400">
                            <option value="">-- Selecciona un libro --</option>
                            @foreach ($libros as $libro)
                                <option value="{{ $libro->codigo }}">{{ $libro->codigo }}</option>
                            @endforeach
                        </select>
                        @error('codigo_libro')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botón de envío -->
                    <button type="submit"
                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none 
                               focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
                               dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                        Registrar Prestamo
                    </button>

                </form> <!-- Fin del formulario -->
            </div> <!-- Fin del contenedor centrado -->
        </div> <!-- Fin del contenido principal -->
    </div> <!-- Fin del contenedor general (flex) -->

</body>
</html>
