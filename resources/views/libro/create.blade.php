<!DOCTYPE html> <!-- Tipo de documento HTML5 -->
<html lang="es"> <!-- El idioma del documento es español -->

<head>
    <meta charset="UTF-8" /> <!-- Codificación de caracteres UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Ajuste para dispositivos móviles -->

    <!-- Tailwind CSS: librería de estilos utilitarios -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite: biblioteca de componentes sobre Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <!-- jQuery: librería JS para manipular el DOM o hacer peticiones AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- FontAwesome: íconos -->
    <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script>

    <!-- Scripts locales -->
    <script type="module" src="../jquery/dashboard.js"></script>
    <script src="../jquery/libro.js"></script>

    <title>Nuevo Libro</title> <!-- Título de la página -->
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen"> <!-- Fondo claro/oscuro + pantalla completa -->

    @include('partes.nav') <!-- Inclusión del navbar superior desde Blade -->

    <div class="flex"> <!-- Contenedor principal con diseño flexible -->

        <!-- Sidebar fijo a la izquierda -->
        <aside class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 pt-16">
            @include('partes.sidebar') <!-- Menú lateral -->
        </aside>

        <!-- Contenido principal -->
        <div class="ml-64 w-full pt-16 p-6 min-h-[calc(100vh-4rem)] flex flex-col">

            <!-- Contenedor centrado para el formulario -->
            <div class="flex-grow flex items-center justify-center">
                <form id="agregar-libro" class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8 w-full max-w-md"
                    action="{{ route('libros.store') }}" method="POST">
                    
                    @csrf <!-- Token CSRF de seguridad -->

                    <!-- Título del formulario -->
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">
                        Registrar Nuevo Libro
                    </h2>

                    <!-- Campo: Código del libro -->
                    <div class="mb-4">
                        <label for="codigo"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código</label>
                        <input type="text" id="codigo" name="codigo" value="{{ old('codigo') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" />
                        @error('codigo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo: Autor del libro -->
                    <div class="mb-4">
                        <label for="autor"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Autor</label>
                        <input type="text" id="autor" name="autor" value="{{ old('autor') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" />
                        @error('autor')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo: Editor del libro -->
                    <div class="mb-4">
                        <label for="editor"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Editor</label>
                        <input type="text" id="editor" name="editor" value="{{ old('editor') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" />
                        @error('editor')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo: Fecha de creación del libro -->
                    <div class="mb-4">
                        <label for="fecha_creacion"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha creacion</label>
                        <input type="date" id="fecha_creacion" name="fecha_creacion"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" />
                        @error('fecha_creacion')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo: Fecha de emisión del libro -->
                    <div class="mb-4">
                        <label for="fecha_emision"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha emision</label>
                        <input type="date" id="fecha_emision" name="fecha_emision"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" />
                        @error('fecha_emision')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botón para enviar el formulario -->
                    <button type="submit"
                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 
                               focus:outline-none focus:ring-blue-300 font-medium rounded-lg 
                               text-sm px-5 py-2.5 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                        Registrar Libro
                    </button>

                </form>
            </div>
        </div>
    </div>

</body>

</html>
