<!DOCTYPE html> <!-- Declaración del tipo de documento HTML5 -->
<html lang="en"> <!-- Idioma del documento en inglés -->

<head>
    <!-- Carga de TailwindCSS para estilos utilitarios -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite: framework que agrega componentes a Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <!-- jQuery: librería para manipulación del DOM y AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- FontAwesome: íconos -->
    <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script>

    <!-- Scripts locales de JavaScript -->
    <script type="module" src="../jquery/dashboard.js"></script>

    <title>Prestamo</title> <!-- Título de la pestaña -->
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen"> <!-- Estilos de fondo claro/oscuro y altura mínima -->

    @include('partes.nav') <!-- Incluye la barra de navegación superior -->

    <div class="flex"> <!-- Contenedor con diseño flexible -->

        <!-- Barra lateral izquierda (Sidebar) fija -->
        <aside class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 pt-16">
            @include('partes.sidebar') <!-- Incluye el menú lateral -->
        </aside>

        <!-- Contenido principal (margen izquierdo para no superponerse con sidebar) -->
        <div class="ml-64 w-full pt-16 p-6 mt-6">

            <div class="mt-6 text-white">
                <!-- Tabla con diseño adaptable y scroll horizontal -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    <!-- Tabla con encabezados -->
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Codigo de estudiante</th>
                                <th scope="col" class="px-6 py-3">Fecha de prestamo</th>
                                <th scope="col" class="px-6 py-3">Fecha de devolucion</th>
                                <th scope="col" class="px-6 py-3">Personal administrativo</th>
                                <th scope="col" class="px-6 py-3">Libro</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>

                        <!-- Cuerpo de la tabla generado dinámicamente -->
                        <tbody id="prestamos">
                            @foreach ($prestamos as $prestamo)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    
                                    <!-- Muestra código del estudiante asociado -->
                                    <td class="px-6 py-4">
                                        {{ $prestamo->codigo_estudiante }}
                                    </td>

                                    <!-- Muestra la fecha del préstamo -->
                                    <td class="px-6 py-4">
                                        {{ $prestamo->fecha_prestamo }}
                                    </td>

                                    <!-- Muestra la fecha de entrega -->
                                    <td class="px-6 py-4">
                                        {{ $prestamo->fecha_entrega }}
                                    </td>

                                    <!-- Muestra el nombre del personal que registró el préstamo -->
                                    <td class="px-6 py-4">
                                        {{ $prestamo->personal }}
                                    </td>

                                    <!-- Muestra el código del libro prestado -->
                                    <td class="px-6 py-4">
                                        {{ $prestamo->codigo_libro }}
                                    </td>

                                    <!-- Botones para editar y eliminar -->
                                    <td class="px-6 py-4 flex space-x-2">
                                        <!-- Botón editar -->
                                        <a href="{{ route('prestamos.edit', $prestamo->id) }}" id="btn-prestamo"
                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 
                                                   focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 
                                                   dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            Editar
                                        </a>

                                        <!-- Formulario para eliminar -->
                                        <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST">
                                            @csrf <!-- Protección CSRF -->
                                            @method('DELETE') <!-- Método HTTP para eliminar -->

                                            <button type="submit" id="btn-eliminar"
                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 
                                                       focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 
                                                       dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table> <!-- Fin de la tabla -->
                </div>
            </div>
        </div>

        <!-- Botón flotante para crear un nuevo préstamo -->
        <div>
            <a href="{{ route('prestamos.create') }}" id="btn-estudiante" type="button"
                class="fixed bottom-5 right-5 p-3 bg-blue-600 text-white rounded-full shadow-lg 
                       hover:bg-blue-700 focus:outline-none focus:ring-2 
                       focus:ring-blue-500 focus:ring-offset-2">
                <i class="fas fa-plus"></i> <!-- Icono de suma -->
            </a>
        </div>
    </div>

</body>

<!-- Script adicional para la lógica de préstamos -->
<script src="../jquery/prestamo.js"></script>

<!-- SweetAlert2: para mostrar alertas personalizadas -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
