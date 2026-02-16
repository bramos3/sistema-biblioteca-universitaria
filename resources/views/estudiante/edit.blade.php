<!DOCTYPE html> <!-- Indica que el documento es HTML5 -->
<html lang="es"> <!-- Establece que el idioma del contenido es español -->

<head>
  <meta charset="UTF-8" /> <!-- Define la codificación de caracteres como UTF-8 (soporta tildes, eñes, etc.) -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Hace que el sitio sea responsive, se adapta a móviles -->

  <script src="https://cdn.tailwindcss.com"></script> <!-- Carga Tailwind CSS desde CDN (framework de estilos con clases utilitarias) -->

  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" /> <!-- Carga estilos de Flowbite, que amplía los componentes de Tailwind -->
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script> <!-- Carga funcionalidades JS de Flowbite -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Carga jQuery para facilitar el manejo del DOM y AJAX -->

  <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script> <!-- Carga íconos desde FontAwesome -->

  <script type="module" src="../jquery/dashboard.js"></script> <!-- Carga un módulo JS personalizado para el dashboard -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Carga SweetAlert2 (librería para mostrar alertas modernas) -->

  <script src="../jquery/estudiante.js"></script> <!-- Carga un archivo JS personalizado para funcionalidades relacionadas al estudiante -->

  <title>Modificar Estudiante</title> <!-- Título de la pestaña en el navegador -->
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen"> <!-- Fondo claro u oscuro según el modo y altura mínima del cuerpo igual a la pantalla -->

  @include('partes.nav') <!-- Inserta el archivo Blade que contiene la barra de navegación superior -->

  <div class="flex"> <!-- Contenedor flexible que agrupa el sidebar y el contenido principal -->

    <aside class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 pt-16"> <!-- Barra lateral izquierda fija de color oscuro -->
      @include('partes.sidebar') <!-- Inserta el archivo Blade de la barra lateral (menú) -->
    </aside>

    <div class="ml-64 w-full pt-16 p-6 min-h-[calc(100vh-4rem)] flex flex-col"> <!-- Contenido principal desplazado a la derecha del sidebar -->

      <div class="flex-grow flex items-center justify-center"> <!-- Centra el formulario horizontal y verticalmente -->

        <form action="{{ route('estudiante.update', $estudiante->codigo) }}" method="POST"
              class="bg-white dark:bg-gray-800 m-0 shadow-lg rounded-2xl p-8 w-full max-w-md">
          <!-- Formulario para modificar los datos del estudiante -->

          @csrf <!-- Token de seguridad CSRF obligatorio en Laravel -->
          @method('PUT') <!-- Define el método HTTP como PUT para actualizar el recurso -->

          <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">
            Modificar Estudiante
          </h2> <!-- Título del formulario -->

          <input type="hidden" id="codigo" name="codigo" value="{{ $estudiante->codigo }}" /> <!-- Campo oculto con el código del estudiante -->

          <!-- Campo Apellidos -->
          <div class="mb-3">
            <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Apellidos
            </label>
            <input type="text" id="apellidos" name="apellidos" placeholder="Ingrese los apellidos del estudiante"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
              focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
              dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
              value="{{ old('apellidos', $estudiante->apellidos) }}" />
            @error('apellidos')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p> <!-- Muestra errores de validación si los hay -->
            @enderror
          </div>

          <!-- Campo Nombres -->
          <div class="mb-4">
            <label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Nombres
            </label>
            <input type="text" id="nombres" name="nombres" placeholder="Ingrese nombre del estudiante"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
              focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
              dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
              value="{{ old('nombres', $estudiante->nombres) }}" />
            @error('nombres')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Campo Teléfono -->
          <div class="mb-4">
            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Teléfono
            </label>
            <input type="tel" id="telefono" name="telefono" placeholder="123456789"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
              focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
              dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
              value="{{ old('telefono', $estudiante->telefono) }}" />
            @error('telefono')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Campo Correo Electrónico -->
          <div class="mb-4">
            <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Correo Electrónico
            </label>
            <input type="email" id="correo" name="correo" placeholder="ejemplo@correo.com"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
              focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
              dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
              value="{{ old('correo', $estudiante->correo) }}" />
            @error('correo')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Botón para enviar el formulario -->
          <button type="submit"
            class="w-full text-white bg-blue-600 hover:bg-blue-700 
            focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium 
            rounded-lg text-sm px-5 py-2.5 dark:bg-blue-500 
            dark:hover:bg-blue-600 dark:focus:ring-blue-800">
            Modificar Estudiante
          </button>

        </form> <!-- Fin del formulario -->
      </div> <!-- Fin del centrado -->
    </div> <!-- Fin del contenedor principal -->
  </div> <!-- Fin del contenedor flex -->

</body>
</html> <!-- Fin del documento HTML -->
