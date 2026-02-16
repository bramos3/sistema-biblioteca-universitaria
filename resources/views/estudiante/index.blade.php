<!DOCTYPE html> <!-- Declara que el documento es HTML5 -->
<html lang="en"> <!-- Define el idioma de la página como inglés (puedes cambiar a "es" si es español) -->

<head>
  <script src="https://cdn.tailwindcss.com"></script> <!-- Carga Tailwind CSS desde CDN (framework de utilidades de CSS) -->

  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" /> <!-- Estilos de componentes Flowbite -->
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script> <!-- Scripts de funcionalidad Flowbite -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Carga jQuery (manipulación DOM, AJAX, etc.) -->

  <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script> <!-- Librería de íconos FontAwesome -->

  <script type="module" src="../jquery/dashboard.js"></script> <!-- Script personalizado para funciones del dashboard -->

  <title>Estudiante</title> <!-- Título de la página que se ve en la pestaña del navegador -->
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen"> <!-- Estilo del body: fondo claro u oscuro, ocupa mínimo el alto de la pantalla -->

  @include('partes.nav') <!-- Inserta la vista parcial 'nav' (barra de navegación superior) -->

  <div class="flex"> <!-- Contenedor flexible (usa flexbox) -->

    <div></div> <!-- Contenedor vacío, puede ser eliminado si no tiene función -->

    <aside class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 pt-16"> <!-- Sidebar lateral oscuro, fijo -->
      @include('partes.sidebar') <!-- Inserta la vista parcial 'sidebar' con el menú lateral -->
    </aside>

    <div class="ml-64 w-full pt-16 p-6 mt-6"> <!-- Contenedor principal (ajustado por el sidebar) -->

      <div class="mt-6 text-white"> <!-- Contenedor interno con margen superior y texto blanco -->

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg"> <!-- Tabla con scroll horizontal, sombra, y bordes redondeados -->

          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <!-- Tabla con estilo claro/oscuro -->
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <!-- Encabezados de la tabla -->
                <th scope="col" class="px-6 py-3">Codigo</th>
                <th scope="col" class="px-6 py-3">Apellidos</th>
                <th scope="col" class="px-6 py-3">Nombres</th>
                <th scope="col" class="px-6 py-3">Telefono</th>
                <th scope="col" class="px-6 py-3">Correo</th>
                <th scope="col" class="px-6 py-3">Action</th> <!-- Acciones: editar/eliminar -->
              </tr>
            </thead>

            @livewire('prueba-component') <!-- Componente Livewire dinámico (puede mostrar información o actualizar en tiempo real) -->

            <tbody id="estudiantes"> <!-- Cuerpo de la tabla con ID para acceder desde JS -->
              @foreach($estudiante as $std) <!-- Itera sobre los estudiantes enviados desde el controlador -->
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                  <!-- Fila de la tabla con cambio de color al pasar el mouse -->
                  
                  <!-- Celdas de la fila -->
                  <td class="px-6 py-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$std->codigo}}
                  </td>
                  <td class="px-6 py-4 text-left">
                    {{$std->apellidos}}
                  </td>
                  <td class="px-6 py-4 text-left">
                    {{$std->nombres}}
                  </td>
                  <td class="px-6 py-4 text-left">
                    {{$std->telefono}}
                  </td>
                  <td class="px-6 py-4 text-left">
                    {{$std->correo}}
                  </td>

                  <!-- Botones de acción -->
                  <td class="px-6 py-4 flex space-x-2">
                    <!-- Botón Editar -->
                    <a href="{{ route('estudiante.edit', $std->codigo) }}"
                       class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 
                       focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 
                       dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                      Editar
                    </a>

                    <!-- Botón Eliminar -->
                    <form action="{{ route('estudiante.destroy', $std->codigo) }}" method="POST" class="inline-block">
                      @csrf <!-- Token CSRF -->
                      @method('DELETE') <!-- Método DELETE (para eliminar) -->
                      <button type="submit"
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 
                        focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 
                        dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        Eliminar
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach <!-- Fin del bucle foreach -->
            </tbody>
          </table>
        </div> <!-- Fin tabla -->
      </div>
    </div>

    <!-- Botón flotante para agregar nuevo estudiante -->
    <div>
      <a href="{{ route('estudiante.create') }}" id="btn-estudiante" type="button"
         class="fixed bottom-5 right-5 p-3 bg-blue-600 text-white rounded-full shadow-lg 
         hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
        <i class="fas fa-plus"></i> <!-- Ícono de "+" -->
      </a>
    </div>
  </div> <!-- Fin del contenedor principal -->

</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Alerta personalizada (SweetAlert) -->

</html> <!-- Fin del documento -->
