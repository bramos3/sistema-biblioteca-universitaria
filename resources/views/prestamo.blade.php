<!DOCTYPE html>
<html lang="en"> <!-- Define el idioma del documento como inglés -->

<head>
    <!-- Importa Tailwind CSS para estilos utilitarios -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Flowbite CSS para componentes adicionales compatibles con Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    
    <!-- Flowbite JS para funcionalidad interactiva -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    
    <!-- jQuery para facilitar la manipulación del DOM y peticiones AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Font Awesome para íconos como lápiz y tacho -->
    <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script>
    
    <!-- Archivo JavaScript personalizado para lógica del dashboard -->
    <script type="module" src="../jquery/dashboard.js"></script>
    
    <!-- Título de la pestaña del navegador -->
    <title>Prestamo</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen"> <!-- Fondo claro u oscuro y altura mínima pantalla completa -->

    @include('partes.nav') <!-- Inserta la barra de navegación desde un archivo Blade -->

    <div class="flex"> <!-- Contenedor flexible que agrupa el aside y el contenido -->
        <!-- Menú lateral izquierdo fijo con fondo oscuro -->
        <aside class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 pt-16">
            @include('partes.sidebar') <!-- Inserta el contenido del menú lateral desde archivo Blade -->
        </aside>

        <!-- Contenedor principal de contenido desplazado a la derecha -->
        <div class="ml-64 w-full pt-16 p-6 mt-6">

            <div class="mt-6 text-white"> <!-- Sección de contenido -->

                <!-- Contenedor de tabla con scroll horizontal y estilos -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    <!-- Tabla para mostrar préstamos -->
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <!-- Cabecera de la tabla -->
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Codigo de estudiante</th>
                                <th scope="col" class="px-6 py-3">Fecha de prestamo</th>
                                <th scope="col" class="px-6 py-3">Fecha de devolucion</th>
                                <th scope="col" class="px-6 py-3">Personal admistrativo</th>
                                <th scope="col" class="px-6 py-3">Libro</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>

                        <!-- Cuerpo de la tabla que se llena con datos del servidor -->
                        <tbody id="prestamos">
                            @foreach ($prestamos as $prestamo) <!-- Itera cada préstamo desde la base de datos -->
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">{{ $prestamo->codigo_estudiante }}</td>
                                    <td class="px-6 py-4">{{ $prestamo->fecha_prestamo }}</td>
                                    <td class="px-6 py-4">{{ $prestamo->fecha_entrega }}</td>
                                    <td class="px-6 py-4">{{ $prestamo->personal }}</td>
                                    <td class="px-6 py-4">{{ $prestamo->codigo_libro }}</td>
                                    <td class="px-6 py-4">
                                        <!-- Botón para eliminar préstamo -->
                                        <form action="{{ route('prestamo.destroy', $prestamo->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="btn-eliminar" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <!-- Botón para editar préstamo -->
                                        <a href="{{ route('upprestamo', $prestamo->id) }}" id="btn-prestamo"
                                            type="button" class="text-blue-600 hover:text-blue-900">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- Botón flotante para agregar nuevo préstamo -->
        <div>
            <a href="{{ route('newprestamo') }}" id="btn-estudiante" type="button"
                class="fixed bottom-5 right-5 p-3 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>

</body>

<!-- Script adicional para lógica específica de préstamos -->
<script src="../jquery/prestamo.js"></script>

<!-- Librería SweetAlert2 para alertas elegantes -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
