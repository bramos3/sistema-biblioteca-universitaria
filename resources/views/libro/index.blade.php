<!DOCTYPE html> <!-- Tipo de documento HTML5 -->
<html lang="en"> <!-- Idioma del documento: inglés -->

<head>
    <!-- Tailwind CSS para diseño responsivo y utilidades de estilos -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite: componentes UI sobre Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <!-- jQuery para interacción JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- FontAwesome para íconos -->
    <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script>

    <!-- Script de funcionalidades internas -->
    <script type="module" src="../jquery/dashboard.js"></script>

    <!-- SweetAlert2 para alertas modernas -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Libro</title> <!-- Título de la pestaña del navegador -->
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen"> <!-- Fondo adaptable claro/oscuro y altura pantalla -->

    @include('partes.nav') <!-- Navbar importado como componente parcial -->

    <div class="flex"> <!-- Contenedor principal con layout en fila -->

        <!-- Sidebar lateral fijo -->
        <aside class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 pt-16">
            @include('partes.sidebar') <!-- Incluye menú lateral -->
        </aside>

        <!-- Contenedor del contenido principal -->
        <div class="ml-64 w-full pt-16 p-6 mt-6">

            <!-- Contenedor de tabla de libros -->
            <div class="mt-6 text-white">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    <!-- Tabla que lista los libros registrados -->
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                        <!-- Encabezados de la tabla -->
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3">Codigo</th>
                                <th class="px-6 py-3">Autor</th>
                                <th class="px-6 py-3">Editor</th>
                                <th class="px-6 py-3">Fecha Creacion</th>
                                <th class="px-6 py-3">Fecha Emision</th>
                                <th class="px-6 py-3">Action</th>
                            </tr>
                        </thead>

                        <!-- Cuerpo de la tabla (libros) -->
                        <tbody>
                            @foreach ($libros as $libro)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                    <!-- Celdas de cada campo -->
                                    <td class="px-6 py-4">{{ $libro->codigo }}</td>
                                    <td class="px-6 py-4">{{ $libro->autor }}</td>
                                    <td class="px-6 py-4">{{ $libro->editor }}</td>
                                    <td class="px-6 py-4">{{ $libro->fecha_creacion }}</td>
                                    <td class="px-6 py-4">{{ $libro->fecha_emision }}</td>

                                    <!-- Botones de acción: Editar y Eliminar -->
                                    <td class="px-6 py-4 flex space-x-2">

                                        <!-- Botón Editar -->
                                        <a href="{{ route('libros.edit', $libro->codigo) }}"
                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            Editar
                                        </a>

                                        <!-- Formulario de eliminación -->
                                        <form action="{{ route('libros.destroy', $libro->codigo) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <!-- Botón flotante para crear nuevo libro -->
        <div>
            <a href="{{ route('libros.create') }}" id="btn-libro" type="button"
                class="fixed bottom-5 right-5 p-3 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>

    <!-- Paginación centrada debajo de la tabla -->
    <div class="justify-center items-center flex">
        {{ $libros->links() }} <!-- Genera los enlaces de paginación -->
    </div>

    <!-- Script para mostrar alertas con SweetAlert si hay una sesión activa -->
    @if (session('swal'))
        <script>
            Swal.fire(@json(session('swal'))) // Muestra la alerta con datos pasados por sesión
        </script>
    @endif

</body>

<!-- Script específico para comportamiento del módulo de libros -->
<script src="../jquery/libro.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
