<!DOCTYPE html> <!-- Documento HTML5 -->
<html lang="es"> <!-- Idioma español -->

<head>
  <meta charset="UTF-8" /> <!-- Codificación de caracteres UTF-8 -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Responsivo en móviles -->

  <!-- Framework de utilidades para estilos (TailwindCSS) -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Flowbite: complementa Tailwind con componentes UI -->
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

  <!-- jQuery: librería para manipulación del DOM -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- FontAwesome: íconos -->
  <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script>

  <!-- Archivos JavaScript propios -->
  <script type="module" src="../jquery/dashboard.js"></script> <!-- Funcionalidad general del panel -->
  <script src="../jquery/prestamo.js"></script> <!-- Lógica específica del préstamo -->

  <title>Editar Prestamo</title> <!-- Título de la pestaña del navegador -->
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen"> <!-- Estilos de fondo y altura mínima -->

  @include('partes.nav') <!-- Inserta el menú superior -->

  <div class="flex"> <!-- Contenedor principal con layout flexible -->

    <!-- Barra lateral izquierda (sidebar) -->
    <aside class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 pt-16">
      @include('partes.sidebar') <!-- Inserta la barra lateral -->
    </aside>

    <!-- Sección principal del contenido -->
    <div class="ml-64 w-full pt-16 p-6 min-h-[calc(100vh-4rem)] flex flex-col">

      <!-- Contenedor centrado del formulario -->
      <div class="flex-grow flex items-center justify-center">
        
        <!-- Formulario para editar préstamo existente -->
        <form action="{{ route('prestamos.update', $prestamo->id) }}" method="POST" 
              class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8 w-full max-w-md">
          
          @csrf <!-- Token de seguridad para evitar ataques CSRF -->
          @method('PUT') <!-- Define el método PUT para actualizar recurso -->

          <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center"> 
            Editar Prestamo
          </h2>

          <!-- Campo oculto con el código del estudiante (no editable) -->
          <input type="hidden" id="codigo_estudiante" name="codigo_estudiante" 
                 value="{{ $prestamo->codigo_estudiante }}"/>

          <!-- Campo: Fecha de préstamo -->
          <div class="mb-4">
            <label for="fecha_prestamo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Fecha de préstamo
            </label>
            <input type="date" id="fecha_prestamo" name="fecha_prestamo" value="{{ $prestamo->fecha_prestamo }}"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                     focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                     dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" />
            @error('fecha_prestamo')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Campo: Fecha de entrega -->
          <div class="mb-4">
            <label for="fecha_entrega" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Fecha de entrega
            </label>
            <input type="date" id="fecha_entrega" name="fecha_entrega" value="{{ $prestamo->fecha_entrega }}"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                     focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                     dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" />
            @error('fecha_entrega')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Campo: Personal responsable del préstamo -->
          <div class="mb-4">
            <label for="personal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Personal
            </label>
            <input type="text" id="personal" name="personal" placeholder="Brandhon valle"
              value="{{ $prestamo->personal }}"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                     focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                     dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" />
            @error('personal')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror 
          </div>

          <!-- Campo oculto con código del libro (no editable) -->
          <input type="hidden" id="codigo_libro" name="codigo_libro" 
                 value="{{ $prestamo->codigo_libro }}"/>

          <!-- Botón de envío del formulario -->
          <button type="submit"
            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none 
                   focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
                   dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
            Editar Prestamo
          </button>

        </form> <!-- Fin del formulario -->
      </div>
    </div> <!-- Fin del contenido principal -->
  </div> <!-- Fin del contenedor general -->

</body>

</html>
