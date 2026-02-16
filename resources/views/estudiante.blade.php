<!DOCTYPE html>
<!-- Declara que este documento es HTML5 -->

<html lang="en">
<!-- Define el idioma del contenido como inglés -->

<head>
  <!-- Incluye Tailwind CSS desde CDN para usar clases utilitarias de estilo -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Incluye Flowbite (complemento de Tailwind para componentes interactivos) -->
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

  <!-- Incluye jQuery, una librería JavaScript para facilitar manipulación DOM y AJAX -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Incluye Font Awesome para usar íconos -->
  <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script>

  <!-- Carga un script personalizado en módulo desde la carpeta jquery -->
  <script type="module" src="../jquery/dashboard.js"></script>

  <!-- Título que aparece en la pestaña del navegador -->
  <title>Estudiante</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen">
  <!-- Estilo de fondo claro/oscuro y altura mínima pantalla completa -->

  <!-- Inserta el componente de navegación (navbar) desde la carpeta 'partes' -->
  @include('partes.nav')

  <div class="flex">
    <!-- Contenedor principal con diseño de flexbox -->

    <aside class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 pt-16">
      <!-- Barra lateral fija a la izquierda con fondo oscuro y texto blanco -->
      @include('partes.sidebar')
      <!-- Incluye el archivo de la barra lateral desde 'partes.sidebar' -->
    </aside>

    <div class="ml-64 w-full pt-16 p-6 mt-6">
      <!-- Contenido principal al lado derecho de la barra lateral -->
      
      <div class="mt-6 text-white">
        <!-- Margen superior y texto blanco -->

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <!-- Contenedor de la tabla con scroll horizontal, sombra y bordes redondeados -->

          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <!-- Tabla completa, texto pequeño alineado a la izquierda, compatible con modo oscuro -->

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <!-- Cabecera de la tabla con fondo gris claro (oscuro si en modo dark) y texto en mayúsculas -->
              <tr>
                <th scope="col" class="px-6 py-3">Codigo</th>
                <th scope="col" class="px-6 py-3">Apellidos</th>
                <th scope="col" class="px-6 py-3">Nombres</th>
                <th scope="col" class="px-6 py-3">Telefono</th>
                <th scope="col" class="px-6 py-3">Correo</th>
                <th scope="col" class="px-6 py-3">Action</th>
              </tr>
            </thead>

            <tbody id="estudiantes">
              <!-- Cuerpo de la tabla donde se mostrarán los estudiantes -->
              @foreach($estudiante as $std)
              <!-- Recorre la lista de estudiantes y crea una fila para cada uno -->
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                <!-- Fila con efecto hover (resaltado al pasar el mouse), compatible con modo oscuro -->
                <td class="px-6 py-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{$std->codigo}}
                </td>
                <td class="px-6 py-4 text-left">{{$std->apellidos}}</td>
                <td class="px-6 py-4 text-left">{{$std->nombres}}</td>
                <td class="px-6 py-4 text-left">{{$std->telefono}}</td>
                <td class="px-6 py-4 text-left">{{$std->correo}}</td>
                <td class="px-6 py-4 text-left">
                  <!-- Enlaces de acciones: editar y borrar -->
                  <a href="#" class="text-blue-600 hover:text-blue-900 font-semibold">Editar</a>
                  <a href="#" class="text-red-600 font-semibold ml-4">Borrar</a>
                </td>
              </tr>
              @endforeach
              <!-- Fin del bucle foreach -->
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div>
      <!-- Botón flotante para crear nuevo estudiante -->
      <a href="{{ route('newestudiante') }}" id="btn-estudiante" type="button"
        class="fixed bottom-5 right-5 p-3 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
        <!-- Ícono de suma para agregar nuevo estudiante -->
        <i class="fas fa-plus"></i>
      </a>
    </div>
  </div>
</body>

<!-- Script de SweetAlert2 para mostrar alertas personalizadas -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
