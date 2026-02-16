<!DOCTYPE html> <!-- Tipo de documento HTML5 -->
<html lang="es"> <!-- Documento en idioma español -->

<head>
    <meta charset="UTF-8" /> <!-- Codificación de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Escala para dispositivos móviles -->

    <!-- Tailwind CSS para estilos utilitarios -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite (componentes para Tailwind) -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <!-- jQuery (por si se usa en JS personalizado) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- FontAwesome para íconos -->
    <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script>

    <!-- Scripts personalizados -->
    <script type="module" src="../jquery/dashboard.js"></script>
    <script src="../jquery/libro.js"></script>

    <title>Nuevo Libro</title> <!-- Título de la página -->
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen"> <!-- Fondo claro/oscuro y altura mínima pantalla completa -->

    @include('partes.nav') <!-- Incluye la barra de navegación desde una vista parcial -->

    <div class="flex"> <!-- Contenedor con layout en fila -->

        <!-- Sidebar lateral fijo -->
        <aside class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 pt-16">
            @include('partes.sidebar') <!-- Menú lateral desde una vista parcial -->
        </aside>

        <!-- Contenedor principal al lado del sidebar -->
        <div class="ml-64 w-full pt-16 p-6 min-h-[calc(100vh-4rem)] flex flex-col">

            <!-- Formulario centrado vertical y horizontalmente -->
            <div class="flex-grow flex items-center justify-center">

                <!-- Formulario para modificar un libro -->
                <form id="modificar-libro"
                    class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8 w-full max-w-md"
                    action="{{ route('libros.update', $libro) }}" method="POST">

                    @csrf <!-- Token de seguridad CSRF -->
                    @method('PUT') <!-- Método HTTP PUT para actualizar -->

                    <!-- Título del formulario -->
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">
                        Modificar Libro
                    </h2>

                    <!-- Campo: Código del libro -->
                    <div class="mb-4">
                        <label for="codigo"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código</label>
                        <input type="text" id="codigo" name="codigo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                            value="{{ old('codigo', $libro['codigo']) }}" />
                        @error('codigo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo: Autor del libro -->
                    <div class="mb-4">
                        <label for="autor"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Autor</label>
                        <input type="text" id="autor" name="autor"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                            value="{{ old('autor', $libro['autor']) }}" />
                        @error('autor')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo: Editor del libro -->
                    <div class="mb-4">
                        <label for="editor"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Editor</label>
                        <input type="text" id="editor" name="editor"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                            value="{{ old('editor', $libro['editor']) }}" />
                        @error('editor')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo: Fecha de creación -->
                    <div class="mb-4">
                        <label for="fecha_creacion"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha creacion</label>
                        <input type="text" id="fecha_creacion" name="fecha_creacion" placeholder="2023-10-01"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                            value="{{ old('fecha_creacion', $libro['fecha_creacion']) }}" />
                        @error('fecha_creacion')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo: Fecha de emisión -->
                    <div class="mb-4">
                        <label for="fecha_emision"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha emision</label>
                        <input type="text" id="fecha_emision" name="fecha_emision" placeholder="2023-10-01"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                            value="{{ old('fecha_emision', $libro['fecha_emision']) }}" />
                        @error('fecha_emision')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botón para enviar el formulario -->
                    <button type="submit"
                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none 
                               focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
                               dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                        Modificar Libro
                    </button>

                </form>
            </div>
        </div>
    </div>

</body>

</html>
